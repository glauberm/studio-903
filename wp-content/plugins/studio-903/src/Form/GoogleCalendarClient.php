<?php

declare(strict_types=1);

namespace Studio903\Form;

use Carbon\CarbonImmutable;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use JsonException;
use Monolog\Logger;

class GoogleCalendarClient
{
    public function __construct(private readonly GuzzleClient $client, private readonly Logger $logger)
    {
    }

    public function getEvents(string $dateString): array
    {
        $date = CarbonImmutable::createFromFormat('Y-m-d', $dateString);

        $timeMin = $date->isToday()
            ? $date->setHour((int) CarbonImmutable::now()->addHour()->format('H'))
            : ($date->isSaturday() ? $date->setHour(8) : $date->setHour(7));

        $timeMax = $date->setHour(22);

        try {
            $response = $this->client->request(
                'GET',
                "https://www.googleapis.com/calendar/v3/calendars/{$_ENV['GOOGLE_CALENDAR_ID']}/events",
                [
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ],
                    'query' => [
                        'key' => $_ENV['GOOGLE_CALENDAR_API_KEY'],
                        'timeMin' => $timeMin->toRfc3339String(),
                        'timeMax' => $timeMax->toRfc3339String(),
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

        try {
            $events = json_decode(
                $response->getBody()->getContents(),
                associative: true,
                flags: JSON_THROW_ON_ERROR
            );
        } catch (JsonException $e) {
            if (WP_DEBUG === true) {
                throw $e;
            } else {
                $this->logger->error($e->getMessage());
            }
        }

        return $this->filterEvents($events);
    }

    public static function getRenderLink(string $source, string $date, string $hour, string $name, string $contact, string $details): string
    {
        $startDate = CarbonImmutable::createFromFormat('Y-m-d H:i', "{$date} {$hour}");

        $endDate = $startDate->addHours(4);

        $dates = "{$startDate->format('Ymd\THis')}/{$endDate->format('Ymd\THis')}";

        return 'https://calendar.google.com/calendar/render?' . http_build_query([
            'action' => 'TEMPLATE',
            'text' => "{$name} - {$contact} - {$source}",
            'dates' => $dates,
            'details' => $details,
        ]);
    }

    private function filterEvents(array $rawEvents): array
    {
        $items = $rawEvents['items'];

        $filteredEvents = [];

        foreach ($items as $item) {
            $filteredEvents[] = [
                'start' => $item['start']['dateTime'],
                'end' => $item['end']['dateTime'],
            ];
        }

        return $filteredEvents;
    }
}
