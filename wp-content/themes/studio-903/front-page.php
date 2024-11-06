<?php

get_header();
?>

<main id="main">
    <?php

    get_template_part(
        'components/cover',
        args: array(
            'title'         => get_the_title(),
            'content'       => get_the_content(),
            'poster'        => get_the_post_thumbnail_url(size: 'cover-poster'),
            'video'         => get_field('cover_video'),
            'primary_cta'   => get_field('cover_primary_cta_label'),
            'secondary_cta' => get_field('cover_secondary_cta_label'),
        )
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->studios->section(),
            'name'          => 'studio-section observed-section',
            'theme'         => 'dark',
            'slot_template' => 'collections/studios',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->services->section(),
            'name'          => 'services-section observed-section',
            'theme'         => 'light',
            'slot_template' => 'collections/services',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->creators->section(),
            'name'          => 'creators-section observed-section',
            'theme'         => 'dark',
            'slot_template' => 'collections/creators',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->benefits->section(),
            'name'          => 'benefits-section',
            'theme'         => 'light',
            'slot_template' => 'collections/benefits',
        ),
    );

    get_template_part(
        'components/section',
        args: array(
            'query'         => s903()->clients->section(),
            'name'          => 'clients-section',
            'theme'         => 'light',
            'slot_template' => 'collections/clients',
        ),
    );

    get_template_part(
        'components/back-cover',
        args: array('query' => s903()->section('contracapa', 'back-cover'))
    );

    ?>
</main>

<?php get_template_part('components/cookie-banner'); ?>

<?php
get_footer();
