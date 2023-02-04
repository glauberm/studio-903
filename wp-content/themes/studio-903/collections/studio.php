<?php

$s903_studios = s903()->studios->collection();

if ( $s903_studios->have_posts() ) {
    $s903_studios->the_post();

	get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                          => 's903-studio',
            'slideshows'                  => $s903_studios->get_posts(),
            'slideshow_template'          => 'collections/studio-images',
            'slideshow_description_field' => 'studio_description',
            'slideshow_cta_field'         => 'studio_cta_label',
        ),
    );
}

wp_reset_postdata();
