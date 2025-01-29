<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <title><?php get_the_title() ? s903()->attr('Studio 903 - ' . get_the_title()) : ''; ?></title>

    <meta name="description" content="<?php s903()->attr(wp_strip_all_tags(get_the_content())); ?>">

    <meta name="robots" content="index,follow">

    <meta name="googlebot" content="index,follow">

    <meta property="og:title" content="<?php get_the_title() ? s903()->attr('Studio 903 - ' . get_the_title()) : ''; ?>">
    <meta property="og:description" content="<?php s903()->attr(wp_strip_all_tags(get_the_content())); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Studio 903">
    <meta property="og:url" content="<?php echo site_url(); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri() . '/images/og-image.png?v=' . wp_get_theme()->get('Version'); ?>">
    <meta property="og:image:alt" content="Studio 903 logo">
    <meta property="og:locale" content="<?php echo pll_current_language('locale'); ?>">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php get_the_title() ? s903()->attr('Studio 903 - ' . get_the_title()) : ''; ?>">
    <meta name="twitter:description" content="<?php s903()->attr(wp_strip_all_tags(get_the_content())); ?>">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri() . '/images/twitter-image.png?v=' . wp_get_theme()->get('Version'); ?>">
    <meta name="twitter:image:alt" content="Studio 903 logo">

    <link rel="preconnect" href="https://www.google.com">

    <link rel="preconnect" href="https://www.gstatic.com" crossorigin>

    <link
        rel="preload"
        href="<?php echo get_the_post_thumbnail_url(size: 'cover-poster'); ?>"
        type="image/jpeg"
        as="image" />

    <link
        rel="preload"
        href="<?php echo get_template_directory_uri() . '/fonts/jost-v15-latin-regular.woff2?v=' . wp_get_theme()->get('Version'); ?>"
        type="font/woff2"
        as="font"
        crossorigin />

    <link
        rel="preload"
        href="<?php echo get_template_directory_uri() . '/fonts/jost-v15-latin-500.woff2?v=' . wp_get_theme()->get('Version'); ?>"
        type="font/woff2"
        as="font"
        crossorigin />

    <link
        rel="preload"
        href="<?php echo get_template_directory_uri() . '/fonts/jost-v18-latin-500italic.woff2?v=' . wp_get_theme()->get('Version'); ?>"
        type="font/woff2"
        as="font"
        crossorigin />

    <style>
        @font-face {
            font-family: 'Jost';
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url("<?php echo get_template_directory_uri() . '/fonts/jost-v15-latin-regular.woff2?v=' . wp_get_theme()->get('Version'); ?>") format('woff2');
        }

        @font-face {
            font-family: 'Jost';
            font-style: normal;
            font-weight: 500;
            font-display: block;
            src: url("<?php echo get_template_directory_uri() . '/fonts/jost-v15-latin-500.woff2?v=' . wp_get_theme()->get('Version'); ?>") format('woff2');
        }

        @font-face {
            font-family: 'Jost';
            font-style: italic;
            font-weight: 500;
            font-display: block;
            src: url("<?php echo get_template_directory_uri() . '/fonts/jost-v18-latin-500italic.woff2?v=' . wp_get_theme()->get('Version'); ?>") format('woff2');
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="header">
        <?php get_template_part('components/header'); ?>
    </header>