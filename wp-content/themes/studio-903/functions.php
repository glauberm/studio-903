<?php

if ( ! defined( 'S903_VERSION' ) ) {
	define( 'S903_VERSION', '0.1.0' );
}

add_image_size( 'client-thumbnail', 400, 200, false );

add_action(
	'init',
	function () {
		register_nav_menus( array( 'main-menu' => 'Menu' ) );
	}
);

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'classic-theme-styles' );
		wp_dequeue_style( 'global-styles' );

		wp_enqueue_style(
			's903-styles',
			get_template_directory_uri() . '/studio-903.css',
			array(),
			S903_VERSION
		);
	}
);
