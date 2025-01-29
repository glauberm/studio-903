<?php

/**
 * Plugin Name: Studio 903
 * Version: 0.9.1
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
};

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Studio903\Services\Logger;
use Studio903\Services\HttpClient;
use Studio903\Studio903;

Dotenv::createImmutable(__DIR__)->load();

function s903(): Studio903
{
    global $studio903;

    if (!isset($studio903)) {
        $httpClient = (new HttpClient())->get();

        $logger = (new Logger(plugin_dir_path(__FILE__)))->get();

        $studio903 = new Studio903($httpClient, $logger);
    }

    return $studio903;
}

s903();
