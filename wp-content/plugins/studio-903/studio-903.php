<?php
/**
 * Plugin Name: Studio 903
 */

defined( 'ABSPATH' ) || die();

define( 'S903_FILMS_ABSPATH', plugin_dir_path( __FILE__ ) );
define( 'S903_FILMS_ABSURL', plugin_dir_url( __FILE__ ) );
define( 'S903_FILMS_VERSION', '0.1.0' );

require_once S903_FILMS_ABSPATH . 'menu/menu.php';
require_once S903_FILMS_ABSPATH . 'post-types/post-types.php';
require_once S903_FILMS_ABSPATH . 'helpers/helpers.php';
