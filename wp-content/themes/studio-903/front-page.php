<?php

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
		'components/cover',
		args: array(
			'video'    => get_field( 'cover_video' ),
			'poster'   => get_field( 'cover_poster' ),
			'title'    => get_field( 'cover_title' ),
			'subtitle' => get_field( 'cover_subtitle' ),
		)
	);

    get_template_part(
        'components/section',
        args: array(
            'query'              => s903()->abouts->section(),
            'name'               => 'about-section',
            'text_field'         => 'about_section_text',
            'slot_template'      => 'collections/about',
            'is_title_invisible' => true,
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'               => s903()->clients->section(),
            'name'                => 'clients-section',
            'container_classname' => 'grid',
            'slot_template'       => 'collections/clients',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->studios->section(),
            'name'          => 'studio-section',
            'slot_template' => 'collections/studio',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->services->section(),
            'name'          => 'services-section',
            'slot_template' => 'collections/services',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->creators->section(),
            'name'          => 'creators-section',
            'slot_template' => 'collections/creators',
        ),
    );
    ?>

    <!--
        get_template_part( 'sections/clients', args: array( 'pagename' => 'clientes', 'lang' => 'pt' ) );
        get_template_part( 'sections/studio', args: array( 'pagename' => 'estudio', 'lang' => 'pt' ) );
        get_template_part( 'sections/services', args: array( 'pagename' => 'servicos', 'lang' => 'pt' ) );
        get_template_part( 'sections/creators', args: array( 'pagename' => 'artistas-e-criadores', 'lang' => 'pt' ) );
        break;
    -->

</main>

<?php
get_footer();
