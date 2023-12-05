<?php

declare(strict_types=1);

namespace Studio903;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\RetryMiddleware;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Studio903\Form\Form;
use Studio903\Form\GoogleCalendarClient;
use Studio903\Form\MailClient;
use Studio903\Form\WhatsAppClient;
use Studio903\PostTypes\AboutPostType;
use Studio903\PostTypes\BenefitPostType;
use Studio903\PostTypes\ClientPostType;
use Studio903\PostTypes\ContactPostType;
use Studio903\PostTypes\CreatorImagePostType;
use Studio903\PostTypes\CreatorPostType;
use Studio903\PostTypes\ServiceImagePostType;
use Studio903\PostTypes\ServicePostType;
use Studio903\PostTypes\SocialPostType;
use Studio903\PostTypes\StudioImagePostType;
use Studio903\PostTypes\StudioPostType;
use WP_Query;

class Studio903
{
    public AboutPostType $abouts;
    public BenefitPostType $benefits;
    public StudioPostType $studios;
    public StudioImagePostType $studiosImages;
    public ServicePostType $services;
    public ServiceImagePostType $servicesImages;
    public CreatorPostType $creators;
    public CreatorImagePostType $creatorsImages;
    public ClientPostType $clients;
    public ContactPostType $contacts;
    public SocialPostType $socials;

    public Form $form;

    public function __construct()
    {
        TidyingRay::tidyUp();

        $this->abouts = new AboutPostType('about');
        $this->clients = new ClientPostType('client');
        $this->studios = new StudioPostType('studio');
        $this->studiosImages = new StudioImagePostType('studio-image', parent: 'studio');
        $this->services = new ServicePostType('service');
        $this->servicesImages = new ServiceImagePostType('service-image', parent: 'service');
        $this->creators = new CreatorPostType('creator');
        $this->creatorsImages = new CreatorImagePostType('creator-image', parent: 'creator');
        $this->benefits = new BenefitPostType('benefit');
        $this->contacts = new ContactPostType('contact');
        $this->socials = new SocialPostType('social');

        add_action(
            'wp_enqueue_scripts',
            function () {
                wp_enqueue_script(
                    's903-recaptcha',
                    "https://www.google.com/recaptcha/api.js?render={$_ENV['GOOGLE_RECAPTCHA_SITE_KEY']}",
                );
            }
        );

        $this->form = new Form(
            $this->getClient(),
            $this->getLogger(),
            new GoogleCalendarClient($this->getClient(), $this->getLogger()),
            new WhatsAppClient($this->getClient(), $this->getLogger()),
            new MailClient($this->getLogger())
        );
    }

    public function html(?string $string): void
    {
        echo $string ? esc_html($string) : null;
    }

    public function attr(?string $string): void
    {
        echo $string ? esc_attr($string) : null;
    }

    public function dd(mixed ...$dumpee): void
    {
        die(var_dump(...$dumpee));
    }

    public function section(string $ptPagename, string $enPagename): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => $ptPagename]);
            default:
                return new WP_Query(['pagename' => $enPagename]);
        }
    }

    private function getLogger(): Logger
    {
        $logger = new Logger('s903_logger');

        $logger->pushHandler(new StreamHandler(S903_ABSPATH . '/s903.log', Level::Error));

        return $logger;
    }

    private function getClient(): Client
    {
        $maxRetries = 3;

        $decider = function (
            int $retries,
            RequestInterface $request,
            ResponseInterface $response = null
        ) use ($maxRetries): bool {
            return $response->getStatusCode() !== 200 && $retries < $maxRetries;
        };

        $delay = function (int $retries, ResponseInterface $response): int {
            if (!$response->hasHeader('Retry-After')) {
                return RetryMiddleware::exponentialDelay($retries);
            }

            $retryAfter = $response->getHeaderLine('Retry-After');

            if (!is_numeric($retryAfter)) {
                $retryAfter = Carbon::parse($retryAfter)->timestamp - Carbon::now()->timestamp;
            }

            return (int) $retryAfter * 1000;
        };

        $stack = HandlerStack::create();

        $stack->push(Middleware::retry($decider, $delay));

        return new Client(['handler'  => $stack]);
    }
}
