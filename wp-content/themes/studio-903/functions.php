<?php

if ( ! defined( 'S903_VERSION' ) ) {
	define( 'S903_VERSION', '0.1.2' );
}

add_image_size( 'client-thumbnail', 400, 200, false );

remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_action(
	'init',
	function () {
		register_nav_menus( array( 'main-menu' => 'Menu' ) );
	}
);

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'style', 'script' ) );
	}
);

add_action(
	'wp_enqueue_scripts',
	function() {
		global $post;

		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'classic-theme-styles' );
		wp_dequeue_style( 'global-styles' );

		wp_enqueue_style(
			's903-styles__main',
			get_template_directory_uri() . '/dist/main.css',
			array(),
			S903_VERSION,
		);
		wp_enqueue_script(
			's903-scripts__main',
			get_template_directory_uri() . '/dist/main.js',
			array(),
			S903_VERSION,
			true
		);

		if ( is_page() ) {
			switch ( $post->post_name ) {
				case 'initial-page':
				case 'pagina-inicial':
					wp_enqueue_style(
						's903-initial-page',
						get_template_directory_uri() . '/dist/page-initial-page.css',
						array(),
						S903_VERSION,
					);
					wp_enqueue_script(
						's903-initial-page',
						get_template_directory_uri() . '/dist/page-initial-page.js',
						array(),
						S903_VERSION,
						true
					);
					break;
				case 'studio-rental':
					wp_enqueue_style(
						's903-styles__page-studio-rental',
						get_template_directory_uri() . '/dist/page-studio-rental.css',
						array(),
						S903_VERSION,
					);
					wp_enqueue_script(
						's903-scripts__page-studio-rental',
						get_template_directory_uri() . '/dist/page-studio-rental.js',
						array(),
						S903_VERSION,
						true
					);
					break;
				case 'locacao-de-estudio':
					wp_enqueue_style(
						's903-styles__page-studio-rental',
						get_template_directory_uri() . '/dist/page-studio-rental.css',
						array(),
						S903_VERSION,
					);
					wp_enqueue_script(
						's903-scripts__page-studio-rental',
						get_template_directory_uri() . '/dist/page-locacao-de-estudio.js',
						array(),
						S903_VERSION,
						true
					);
					break;
			}
		}
	}
);
