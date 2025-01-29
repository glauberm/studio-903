<?php

declare(strict_types=1);

namespace Studio903\Form;

use Carbon\CarbonImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use Monolog\Logger;
use Studio903\Studio903;

class WhatsAppClient
{
    public static string $msgCountOption = 's903_wpp_msg_count';

    public static string $lastMsgDatetimeOption = 's903_wpp_msg_last';

    private int $msgCountLimit = 100;

    private int $msgDatetimeLimitInHours = 30;

    public function __construct(private readonly Client $client, private readonly Logger $logger) {}

    public function sendMessage(string $source, string $date, string $hour, string $name, string $contact, string $details): void
    {
        $googleCalendarRenderLink = GoogleCalendarClient::getRenderLink(
            $source,
            $date,
            $hour,
            $name,
            $contact,
            $details
        );

        $dateTime = CarbonImmutable::createFromFormat('Y-m-d H:i', "{$date} {$hour}")
            ->setTimezone(Studio903::TIMEZONE);

        $now = CarbonImmutable::now()->setTimezone(Studio903::TIMEZONE);

        try {
            $response = $this->client->request(
                'POST',
                "https://graph.facebook.com/v20.0/{$_ENV['WHATSAPP_PHONE_NUMBER_ID']}/messages",
                [
                    'headers' => [
                        'Authorization' => "Bearer {$_ENV['WHATSAPP_ACCESS_TOKEN']}",
                        'Content-Type' => 'application/json'
                    ],
                    'json' => [
                        'messaging_product' => 'whatsapp',
                        'to' => $_ENV['WHATSAPP_RECIPIENT_WAID'],
                        'type' => 'template',
                        'template' => [
                            'name' => 's903_cta',
                            'language' => [
                                'code' => 'pt_BR',
                            ],
                            "components" => [
                                [
                                    "type" => "body",
                                    "parameters" => [
                                        [
                                            "type" => "text",
                                            "text" => $source
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $dateTime->format('d/m/Y'),
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $hour
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $name
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $contact
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $details === '' ? 'Não há observações' : $details,
                                        ],
                                        [
                                            "type" => "text",
                                            "text" => $googleCalendarRenderLink,
                                        ],
                                    ]
                                ]
                            ],
                        ],
                    ],
                ]
            );
        } catch (ClientException $e) {
            $this->logger->error(Message::toString($e->getRequest()));
            $this->logger->error(Message::toString($e->getResponse()));

            return;
        }

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            global $wpdb;

            $wpdb->replace($wpdb->prefix . "options", [
                'option_name' => self::$msgCountOption,
                'option_value' => $this->timerHasReset($now) ? 1 : $this->getMsgCount() + 1,
                'autoload' => 'no',
            ]);

            $wpdb->replace($wpdb->prefix . "options", [
                'option_name' => self::$lastMsgDatetimeOption,
                'option_value' => $now->format('Y-m-d H:i'),
                'autoload' => 'no',
            ]);
        }
    }

    public function hasntReachedLimit(): bool
    {
        $msgCount = $this->getMsgCount();

        return $msgCount < $this->msgCountLimit;
    }

    private function timerHasReset(CarbonImmutable $now): bool
    {
        $lastMsgDatetime = $this->getLastMsgDatetime();

        return $lastMsgDatetime->diffInHours($now, false) > $this->msgDatetimeLimitInHours;
    }

    private function getMsgCount(): int
    {
        $msgCount = get_option(self::$msgCountOption);

        return (int) $msgCount;
    }

    private function getLastMsgDatetime(): CarbonImmutable
    {
        $lastMsgDatetime = get_option(self::$lastMsgDatetimeOption);

        return CarbonImmutable::parse($lastMsgDatetime)->shiftTimezone(Studio903::TIMEZONE);
    }
}
