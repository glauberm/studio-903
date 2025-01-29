<?php

declare(strict_types=1);

namespace Tests;

use Carbon\CarbonImmutable;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Studio903\Form\Form;
use Studio903\Studio903;

final class FormTest extends TestCase
{
    public function testGetDates(): void
    {
        $client = $this->httpClient(new MockHandler());

        $form = new Form($client, $this->logger);

        $datetime = CarbonImmutable::createFromFormat('Y-m-d H:i:s', '2023-02-02 00:00:00')
            ->shiftTimezone(Studio903::TIMEZONE);

        self::assertEquals(
            $form->getDates($datetime),
            [
                ['value' => '2023-02-02', 'day' => '02', 'month' => '02'],
                ['value' => '2023-02-03', 'day' => '03', 'month' => '02'],
                ['value' => '2023-02-04', 'day' => '04', 'month' => '02'],
                ['value' => '2023-02-06', 'day' => '06', 'month' => '02'],
                ['value' => '2023-02-07', 'day' => '07', 'month' => '02'],
                ['value' => '2023-02-08', 'day' => '08', 'month' => '02'],
                ['value' => '2023-02-09', 'day' => '09', 'month' => '02'],
                ['value' => '2023-02-10', 'day' => '10', 'month' => '02'],
                ['value' => '2023-02-11', 'day' => '11', 'month' => '02'],
                ['value' => '2023-02-13', 'day' => '13', 'month' => '02'],
                ['value' => '2023-02-14', 'day' => '14', 'month' => '02'],
                ['value' => '2023-02-15', 'day' => '15', 'month' => '02'],
                ['value' => '2023-02-16', 'day' => '16', 'month' => '02'],
                ['value' => '2023-02-17', 'day' => '17', 'month' => '02'],
                ['value' => '2023-02-18', 'day' => '18', 'month' => '02'],
                ['value' => '2023-02-20', 'day' => '20', 'month' => '02'],
                ['value' => '2023-02-21', 'day' => '21', 'month' => '02'],
                ['value' => '2023-02-22', 'day' => '22', 'month' => '02'],
                ['value' => '2023-02-23', 'day' => '23', 'month' => '02'],
                ['value' => '2023-02-24', 'day' => '24', 'month' => '02'],
                ['value' => '2023-02-25', 'day' => '25', 'month' => '02'],
                ['value' => '2023-02-27', 'day' => '27', 'month' => '02'],
                ['value' => '2023-02-28', 'day' => '28', 'month' => '02'],
                ['value' => '2023-03-01', 'day' => '01', 'month' => '03'],
                ['value' => '2023-03-02', 'day' => '02', 'month' => '03'],
            ]
        );
    }

    public function testGetDatesAfterSix(): void
    {
        $client = $this->httpClient(new MockHandler());

        $form = new Form($client, $this->logger);

        $datetime = CarbonImmutable::createFromFormat('Y-m-d H:i:s', '2023-02-02 18:00:00');

        self::assertEquals(
            $form->getDates($datetime),
            [
                ['value' => '2023-02-03', 'day' => '03', 'month' => '02'],
                ['value' => '2023-02-04', 'day' => '04', 'month' => '02'],
                ['value' => '2023-02-06', 'day' => '06', 'month' => '02'],
                ['value' => '2023-02-07', 'day' => '07', 'month' => '02'],
                ['value' => '2023-02-08', 'day' => '08', 'month' => '02'],
                ['value' => '2023-02-09', 'day' => '09', 'month' => '02'],
                ['value' => '2023-02-10', 'day' => '10', 'month' => '02'],
                ['value' => '2023-02-11', 'day' => '11', 'month' => '02'],
                ['value' => '2023-02-13', 'day' => '13', 'month' => '02'],
                ['value' => '2023-02-14', 'day' => '14', 'month' => '02'],
                ['value' => '2023-02-15', 'day' => '15', 'month' => '02'],
                ['value' => '2023-02-16', 'day' => '16', 'month' => '02'],
                ['value' => '2023-02-17', 'day' => '17', 'month' => '02'],
                ['value' => '2023-02-18', 'day' => '18', 'month' => '02'],
                ['value' => '2023-02-20', 'day' => '20', 'month' => '02'],
                ['value' => '2023-02-21', 'day' => '21', 'month' => '02'],
                ['value' => '2023-02-22', 'day' => '22', 'month' => '02'],
                ['value' => '2023-02-23', 'day' => '23', 'month' => '02'],
                ['value' => '2023-02-24', 'day' => '24', 'month' => '02'],
                ['value' => '2023-02-25', 'day' => '25', 'month' => '02'],
                ['value' => '2023-02-27', 'day' => '27', 'month' => '02'],
                ['value' => '2023-02-28', 'day' => '28', 'month' => '02'],
                ['value' => '2023-03-01', 'day' => '01', 'month' => '03'],
                ['value' => '2023-03-02', 'day' => '02', 'month' => '03'],
                ['value' => '2023-03-03', 'day' => '03', 'month' => '03'],
            ]
        );
    }

    public function testGetHours(): void
    {
        $mock = new MockHandler([
            new Response(),
        ]);

        $client = $this->httpClient($mock);

        $form = new Form($client, $this->logger);

        self::assertEquals(
            $form->getHours('2023-02-02'),
            [
                "07:00",
                "07:30",
                "08:00",
                "08:30",
                "09:00",
                "09:30",
                "10:00",
                "10:30",
                "11:00",
                "11:30",
                "12:00",
                "12:30",
                "13:00",
                "13:30",
                "14:00",
                "14:30",
                "15:00",
                "15:30",
                "16:00",
                "16:30",
                "17:00",
                "17:30",
                "18:00",
            ]
        );
    }

    public function testSubmit()
    {
        $mock = new MockHandler([
            new Response(body: '{"success":true,"score":0.9}'),
        ]);

        $client = $this->httpClient($mock);

        $form = new Form($client, $this->logger);

        self::assertEquals(
            $form->submit(
                token: 'token',
                source: 'Test',
                date: '2023-02-02',
                hour: '17:00',
                name: 'Glauber',
                contact: 'glaubernm@gmail.com',
                details: 'Lorem Ipsum',
            ),
            ['status' => 'success', 'code' => 'ok']
        );
    }
}
