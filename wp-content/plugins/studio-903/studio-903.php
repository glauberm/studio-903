<?php
/**
 * Plugin Name: Studio 903
 */

defined( 'ABSPATH' ) || die();

define( 'S903_ABSPATH', plugin_dir_path( __FILE__ ) );
define( 'S903_ABSURL', plugin_dir_url( __FILE__ ) );
define( 'S903_VERSION', '0.1.0' );

require_once S903_ABSPATH . 'menu/menu.php';
require_once S903_ABSPATH . 'post-types/post-types.php';
require_once S903_ABSPATH . 'helpers/helpers.php';
