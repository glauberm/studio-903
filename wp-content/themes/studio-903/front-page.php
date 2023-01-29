<?php
$s903_is_en = pll_current_language() === 'en';
$s903_is_pt = pll_current_language() === 'pt';

get_header(
    args: array(
        'preload' => array(
            array(
                'href' => get_field( 'cover_video' ),
                'type' => 'video/mp4',
                'as'   => 'video',
            ),
            array(
                'href' => get_field( 'cover_poster' ),
                'type' => 'image/jpeg',
                'as'   => 'image',
            ),
        ),
    )
);
?>

<main class="main">
	<?php
	get_template_part(
		'sections/cover',
		args: array(
			'video'    => get_field( 'cover_video' ),
			'poster'   => get_field( 'cover_poster' ),
			'title'    => get_field( 'cover_title' ),
			'subtitle' => get_field( 'cover_subtitle' ),
		)
	);
	?>

    <?php get_template_part( 'sections/about', args: array( 'pagename' => 'about', 'lang' => 'en' ) ); ?>
    <?php get_template_part( 'sections/about', args: array( 'pagename' => 'sobre', 'lang' => 'pt' ) ); ?>

    <?php get_template_part( 'sections/clients', args: array( 'pagename' => 'clients', 'lang' => 'en' ) ); ?>
    <?php get_template_part( 'sections/clients', args: array( 'pagename' => 'clientes', 'lang' => 'pt' ) ); ?>

    <?php get_template_part( 'sections/studio', args: array( 'pagename' => 'studio', 'lang' => 'en' ) ); ?>
    <?php get_template_part( 'sections/studio', args: array( 'pagename' => 'estudio', 'lang' => 'pt' ) ); ?>

    <?php get_template_part( 'sections/services', args: array( 'pagename' => 'services', 'lang' => 'en' ) ); ?>
    <?php get_template_part( 'sections/services', args: array( 'pagename' => 'servicos', 'lang' => 'pt' ) ); ?>

    <?php get_template_part( 'sections/creators', args: array( 'pagename' => 'artists-and-creators', 'lang' => 'en' ) ); ?>
    <?php get_template_part( 'sections/creators', args: array( 'pagename' => 'artistas-e-criadores', 'lang' => 'pt' ) ); ?>

</main>

<?php
get_footer();
