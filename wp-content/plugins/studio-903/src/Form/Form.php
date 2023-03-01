<?php

declare(strict_types=1);

namespace Studio903\Form;

use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use WP_REST_Request;

class Form
{
    public function __construct(
        private readonly GoogleCalendarClient $googleCalendarClient,
        private readonly WhatsAppClient $whatsAppClient,
        private readonly MailClient $mailClient
    ) {
        $this->registerSubmitRoute();
        $this->registerGetHoursRoute();
    }

    public function label(string $label)
    {
        echo $this->labels()[$label];
    }

    public function message(string $message)
    {
        echo $this->messages()[$message];
    }

    public function getDates(?CarbonImmutable $now = null): array
    {
        $now = $now ?? CarbonImmutable::now();

        $start = intval($now->format('H')) >= 18 ? $now->addDay() : $now;

        $end = $start->addMonth();

        $period = CarbonPeriod::create($start, $end);

        $dates = [];

        foreach ($period as $date) {
            if ($date->isSunday()) {
                continue;
            }

            $dates[] = [
                'value' => $date->format('Y-m-d'),
                'day' => $date->format('d'),
                'month' => $date->format('m')
            ];
        }

        return $dates;
    }

    public function getHours(string $dateString): array
    {
        $date = CarbonImmutable::createFromFormat('Y-m-d', $dateString);

        $start = $date->isSaturday()
            ? $date->setHour(8)->setMinutes(0)
            : $date->setHour(7)->setMinutes(0);

        $end = $date->setHour(18)->setMinutes(0);

        $period = CarbonPeriod::create($start, $end, '30 minutes');

        $events = $this->googleCalendarClient->getEvents($dateString);

        foreach ($events as $event) {
            $period->addFilter(function ($date) use ($event) {
                return !($date->greaterThanOrEqualTo($event['start'])
                    && $date->lessThanOrEqualTo($event['end']));
            });
        }

        $hours = [];

        foreach ($period as $hour) {
            $hours[] = $hour->format('H:i');
        }

        return $hours;
    }

    public function submit(string $source, string $date, string $hour, string $name, string $contact, string $details): void
    {
        $this->whatsAppClient->sendMessage($source, $date, $hour, $name, $contact, $details);

        $this->mailClient->sendEmail($source, $date, $hour, $name, $contact, $details);
    }

    private function registerGetHoursRoute()
    {
        add_action(
            'rest_api_init',
            function () {
                register_rest_route(
                    's903',
                    '/get-hours',
                    [
                        'methods' => 'POST',
                        'callback' => function (WP_REST_Request $request): array {
                            return $this->getHours($request['date']);
                        },
                        'args' => [
                            'date' => [
                                'required' => true,
                                'validate_callback' => function ($param, $request, $key) {
                                    return in_array($param, array_column($this->getDates(), 'value'));
                                }
                            ],
                        ],
                        'permission_callback' => function (WP_REST_Request $request) {
                            return true;
                        },
                    ]
                );
            }
        );
    }

    private function registerSubmitRoute(): void
    {
        add_action(
            'rest_api_init',
            function () {
                register_rest_route(
                    's903',
                    '/submit',
                    [
                        'methods' => 'POST',
                        'callback' => function (WP_REST_Request $request): void {
                            $this->submit(
                                $request['source'],
                                $request['date'],
                                $request['hour'],
                                $request['name'],
                                $request['contact_value'],
                                $request['details'],
                            );
                        },
                        'args' => [
                            'source' => [
                                'required' => true,
                                'type' => 'string',
                            ],
                            'date' => [
                                'required' => true,
                                'type' => 'string',
                                'validate_callback' => function ($param, $request, $key) {
                                    return $param !== ''
                                        && in_array($param, array_column($this->getDates(), 'value'));
                                }
                            ],
                            'hour' => [
                                'required' => true,
                                'type' => 'string',
                                'validate_callback' => function ($param, $request, $key) {
                                    return $param !== ''
                                        && in_array($param, $this->getHours($request['date']));
                                }
                            ],
                            'name' => [
                                'required' => true,
                                'type' => 'string',
                                'validate_callback' => function ($param, $request, $key) {
                                    return $param !== '';
                                }
                            ],
                            'contact_key' => [
                                'required' => true,
                                'type' => 'string',
                                'validate_callback' => function ($param, $request, $key) {
                                    return $param !== ''
                                        && in_array($param, ['whatsapp', 'phone', 'email']);
                                }
                            ],
                            'contact_value' => [
                                'required' => true,
                                'type' => 'string',
                                'validate_callback' => function ($param, $request, $key) {
                                    switch ($request['contact_key']) {
                                        case 'whatsapp':
                                        case 'phone':
                                            return $param !== '';
                                        case 'email':
                                            return $param !== '' && is_email($param);
                                        default:
                                            return false;
                                    }
                                }
                            ],
                            'details' => [
                                'required' => true,
                                'type' => 'string',
                                'default' => '',
                            ],
                        ],
                        'permission_callback' => function (WP_REST_Request $request) {
                            return true;
                        },
                    ]
                );
            }
        );
    }

    private function labels()
    {
        switch (pll_current_language()) {
            case 'pt':
                return [
                    'date' => 'Data',
                    'date_select' => 'Selecione uma data',
                    'hour' => 'Hora',
                    'name' => 'Nome',
                    'contact_key' => 'Contato por',
                    'contact_phone_value' => 'Telefone',
                    'contact_email_value' => 'Email',
                    'contact_whatsapp_option' => 'WhatsApp',
                    'contact_phone_option' => 'Telefone',
                    'contact_email_option' => 'Email',
                    'add_details' => 'Adicionar observações',
                    'details' => 'Observações',
                    'not_required' => '(Não obrigatório)',
                    'submit' => 'Enviar'
                ];
            default:
                return [
                    'date' => 'Date',
                    'date_select' => 'Select a date',
                    'hour' => 'Hour',
                    'name' => 'Name',
                    'contact_key' => 'Contact you by',
                    'contact_phone_value' => 'Phone number',
                    'contact_email_value' => 'Email address',
                    'contact_email_value' => 'Email',
                    'contact_whatsapp_option' => 'WhatsApp',
                    'contact_phone_option' => 'Phone',
                    'contact_email_option' => 'Email',
                    'add_details' => 'Add notes',
                    'details' => 'Notes',
                    'not_required' => '(Not required)',
                    'submit' => 'Submit'
                ];
        }
    }

    private function messages()
    {
        switch (pll_current_language()) {
            case 'pt':
                return [
                    'success' => 'Obrigado, em breve entraremos em contato com você.',
                    'error' => 'Há erros no formulário. Por favor, confira os campos e tente novamente.',
                    'hour-error' => 'Houve um erro ao listar nossas horas disponíveis neste dia. Por favor, tente novamente.',
                ];
            default:
                return [
                    'success' => 'Thank you, we will contact you shortly.',
                    'error' => 'There are errors on the form. Please check the fields and try again.',
                    'hour-error' => 'There was an error listing our available hours for this day. Please try again.',
                ];
        }
    }
}
