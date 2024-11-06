<?php

declare(strict_types=1);

namespace Studio903\Services;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger as Monolog;

class Logger
{
    public function __construct(private readonly string $baseBath) {}
    public function get(): Monolog
    {
        $logger = new Monolog('s903');

        $formatter = new LineFormatter(
            allowInlineLineBreaks: true,
            includeStacktraces: true,
        );

        $handler = new StreamHandler($this->baseBath . '/s903.log', Level::Debug);

        $handler->setFormatter($formatter);

        $logger->pushHandler($handler);

        return $logger;
    }
}
