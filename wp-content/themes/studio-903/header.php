<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php if ( array_key_exists( 'preload', $args ) ) { ?>
        <?php foreach ( $args['preload'] as $s903_preload ) { ?>
            <link
				rel="preload"
				href="<?php echo $s903_preload['href']; ?>"
				type="<?php echo $s903_preload['type']; ?>"
				as="<?php echo $s903_preload['as']; ?>"
				<?php echo 'font' === $s903_preload['as'] ? 'crossorigin' : ''; ?>
			/>
        <?php } ?>
    <?php } ?>

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

        @font-face {
            font-family: 'Domine';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url("<?php echo get_template_directory_uri() . '/fonts/domine-v19-latin-700.woff2'; ?>") format('woff2');
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header>
        <?php get_template_part( 'components/header' ); ?>
    </header>
