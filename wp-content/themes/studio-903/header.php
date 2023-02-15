<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <title><?php get_the_title() ? s903()->attr( 'Studio 903 - ' . get_the_title() ) : ''; ?></title>

    <meta name="description" content="<?php s903()->attr( wp_strip_all_tags( get_the_content() ) ); ?>">

    <meta name="robots" content="index,follow">

    <meta name="googlebot" content="index,follow">

    <link
        rel="preload"
        href="<?php echo get_the_post_thumbnail_url( size: 'cover-poster' ); ?>"
        type="image/jpeg"
        as="image"
    />

    <link
        rel="preload"
        href="<?php echo get_template_directory_uri() . '/fonts/bebas-neue-v9-latin-regular.woff2'; ?>"
        type="font/woff2"
        as="font"
        crossorigin
    />

    <link
        rel="preload"
        href="<?php echo get_template_directory_uri() . '/fonts/domine-v19-latin-regular.woff2'; ?>"
        type="font/woff2"
        as="font"
        crossorigin
    />

    <style>
        @font-face {
            font-family: 'Bebas Neue';
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url("<?php echo get_template_directory_uri() . '/fonts/bebas-neue-v9-latin-regular.woff2'; ?>") format('woff2');
        }

        @font-face {
            font-family: 'Domine';
            font-style: normal;
            font-weight: 400;
            font-display: block;
            src: url("<?php echo get_template_directory_uri() . '/fonts/domine-v19-latin-regular.woff2'; ?>") format('woff2');
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="header">
        <?php get_template_part( 'components/header' ); ?>
    </header>
