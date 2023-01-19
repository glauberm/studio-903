<?php

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'meta', 'style', 'script' ) );
	}
);

remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style( 'wp-block-library' );

		wp_dequeue_style( 'classic-theme-styles' );

		wp_dequeue_style( 'global-styles' );

		wp_enqueue_style(
			's903-styles',
			get_template_directory_uri() . '/dist/s903.css',
			array(),
			S903_VERSION,
		);

		wp_enqueue_script(
			's903-scripts',
			get_template_directory_uri() . '/dist/s903.js',
			array(),
			S903_VERSION,
			true
		);
	}
);
