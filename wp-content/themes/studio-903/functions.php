<?php

if (! defined('S903_VERSION')) {
    define('S903_VERSION', '0.8.1');
}

add_image_size('cover-poster', 720, 900, false);
add_image_size('client-thumbnail', 200, 100, false);
add_image_size('client-thumbnail-lg', 400, 200, false);
add_image_size('slideshow-navigator-thumbnail', 80, 80, true);
add_image_size('slideshow-thumbnail', 150, 150, true);
add_image_size('slideshow-thumbnail-lg', 300, 300, true);
add_image_size('slideshow-image', 720, 720, true);
add_image_size('slideshow-image-lg', 1440, 1440, false);
add_image_size('benefit-thumbnail', 400, 400, true);
add_image_size('benefit-thumbnail-lg', 720, 720, true);

add_action(
    'init',
    function () {
        register_nav_menus(array('main-menu' => 'Menu'));
    }
);

add_action(
    'after_setup_theme',
    function () {
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('meta', 'style', 'script'));
    }
);

add_action(
    'wp_enqueue_scripts',
    function () {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('global-styles');

        wp_enqueue_style(
            handle: 's903-styles',
            src: get_template_directory_uri() . '/dist/s903.css',
            ver: S903_VERSION,
            media: 'screen'
        );

        wp_enqueue_script(
            handle: 's903-scripts',
            src: get_template_directory_uri() . '/dist/s903.js',
            ver: S903_VERSION,
            args: [
                'strategy' => 'defer',
                'in_footer' => false,
            ]
        );
    }
);

remove_action(
    'wp_body_open',
    'wp_global_styles_render_svg_filters',
);

function s903_get_contact_image(string $type)
{
    switch ($type) {
        case 'whatsapp':
            get_template_part('images/whatsapp.svg');
            break;
        case 'phone':
            get_template_part('images/phone.svg');
            break;
        case 'mobile':
            get_template_part('images/smartphone.svg');
            break;
        case 'email':
            get_template_part('images/mail.svg');
            break;
        case 'address':
            get_template_part('images/address.svg');
            break;
    }
}

function s903_get_social_image(string $type)
{
    switch ($type) {
        case 'instagram':
            get_template_part('images/instagram.svg');
            break;
        case 'facebook':
            get_template_part('images/facebook.svg');
            break;
        case 'linkedin':
            get_template_part('images/linkedin.svg');
            break;
    }
}
