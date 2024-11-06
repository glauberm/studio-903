<?php

declare(strict_types=1);

namespace Studio903\Services;

use Carbon\CarbonImmutable;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\RetryMiddleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    public function get(): GuzzleClient
    {
        $stack = HandlerStack::create();

        $stack->push($this->retryStrategy());

        return new GuzzleClient(['handler' => $stack]);
    }

    private function retryStrategy(): callable
    {
        $maxRetries = 3;

        $decider = function (
            int $retries,
            RequestInterface $request,
            ResponseInterface $response,
        ) use ($maxRetries): bool {
            return $response->getStatusCode() !== 200 && $retries < $maxRetries;
        };

        $delay = function (int $retries, ResponseInterface $response): int {
            if (!$response->hasHeader('Retry-After')) {
                return RetryMiddleware::exponentialDelay($retries);
            }

            $retryAfter = $response->getHeaderLine('Retry-After');

            if (!is_numeric($retryAfter)) {
                $now = CarbonImmutable::now()->timestamp;

                $retryAfter = CarbonImmutable::parse($retryAfter)->timestamp;

                $retryAfter = $retryAfter - $now;
            }

            return (int) $retryAfter * 1000;
        };

        return Middleware::retry($decider, $delay);
    }
}
