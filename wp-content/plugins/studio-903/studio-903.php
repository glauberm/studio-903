<?php

/**
 * Plugin Name: Studio 903
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
};

require __DIR__ . '/vendor/autoload.php';

use Studio903\Editor;
use Studio903\Studio903;
use Studio903\TidyingRay;

$studio903 = new Studio903(new Editor(), new TidyingRay());
