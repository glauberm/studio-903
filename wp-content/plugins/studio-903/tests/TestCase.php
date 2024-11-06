<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use Monolog\Handler\TestHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected Logger $logger;

    protected TestHandler $loggerHandler;

    public function setUp(): void
    {
        $this->logger = new Logger('s903_test');

        $this->loggerHandler = new TestHandler();

        $this->logger->pushHandler($this->loggerHandler);
    }

    protected function httpClient(MockHandler $mock): Client
    {
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        return $client;
    }
}
