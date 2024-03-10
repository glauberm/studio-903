<?php

$s903_studios_images_collection = s903()->studiosImages->collection( $args['slideshow_id'] );

if ( $s903_studios_images_collection->have_posts() ) {
    get_template_part(
        'components/slideshow',
        args: array(
            'id'          => "{$args['navigator_id']}-{$args['slideshow_id']}",
            'title'       => $args['slideshow_title'],
            'description' => $args['slideshow_description'],
            'cta'         => $args['slideshow_cta'],
            'images'      => $s903_studios_images_collection->get_posts(),
            'image_field' => 'studio_image_url',
        ),
    );
}

wp_reset_postdata();
