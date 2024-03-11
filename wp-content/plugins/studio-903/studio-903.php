<?php

/**
 * Plugin Name: Studio 903
 * Version: 0.7.0
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
};

date_default_timezone_set('America/Sao_Paulo');

define('S903_ABSPATH', plugin_dir_path(__FILE__));

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Studio903\Studio903;

Dotenv::createImmutable(__DIR__)->load();

function s903(): Studio903
{
    global $studio903;

    if (!isset($studio903)) {
        $studio903 = new Studio903();
    }

    return $studio903;
}

s903();
