<?php

/**
 * Plugin Name: Studio 903
 * Version: 0.1.2
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
};

define('S903_ABSPATH', plugin_dir_path(__FILE__));

require __DIR__ . '/vendor/autoload.php';

use Studio903\Editor;
use Studio903\Studio903;
use Studio903\TidyingRay;

function s903(): Studio903
{
    global $studio903;

    if (! isset($studio903)) {
        $studio903 = new Studio903(new Editor(), new TidyingRay());
    }

    return $studio903;
}

s903();
