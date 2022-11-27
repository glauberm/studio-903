<?php

add_action(
	'init',
	function () {
		remove_post_type_support( 'page', 'editor' );
		remove_post_type_support( 'page', 'author' );
		remove_post_type_support( 'page', 'thumbnail' );
		remove_post_type_support( 'page', 'excerpt' );
		remove_post_type_support( 'page', 'trackbacks' );
		remove_post_type_support( 'page', 'custom-fields' );
		remove_post_type_support( 'page', 'comments' );
		remove_post_type_support( 'page', 'page-attributes' );
		remove_post_type_support( 'page', 'post-formats' );
	}
);

add_action(
	'init',
	function () {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter(
			'tiny_mce_plugins',
			function ( $plugins ) {
				if ( is_array( $plugins ) ) {
					return array_diff( $plugins, array( 'wpemoji' ) );
				} else {
					return array();
				}
			}
		);
	}
);

add_filter(
	'acf/fields/wysiwyg/toolbars',
	function ( $toolbars ) {
		$toolbars['Essential']    = array();
		$toolbars['Essential'][1] = array(
			'link',
			'undo',
			'redo',
			'spellchecker',
			'fullscreen',
		);

		return $toolbars;
	}
);

add_filter(
	'tiny_mce_before_init',
	function ( $in ) {
		$in['paste_as_text'] = true;

		return $in;
	}
);
