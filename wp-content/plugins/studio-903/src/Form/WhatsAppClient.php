<?php

declare(strict_types=1);

namespace Studio903\Form;

use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use Monolog\Logger;

class WhatsAppClient
{
    public function __construct(private readonly GuzzleClient $client, private readonly Logger $logger)
    {
    }

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

        $dateTime = Carbon::createFromFormat('Y-m-d H:i', "{$date} {$hour}");

        try {
            $this->client->request(
                'POST',
                "https://graph.facebook.com/v15.0/{$_ENV['WHATSAPP_PHONE_NUMBER_ID']}/messages",
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
            if (WP_DEBUG === true) {
                throw $e;
            } else {
                $this->logger->error(Message::toString($e->getRequest()));
                $this->logger->error(Message::toString($e->getResponse()));
            }
        }
    }
}
