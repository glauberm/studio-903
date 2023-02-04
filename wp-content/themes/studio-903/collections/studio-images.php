<?php

$s903_studios_images = s903()->studiosImages->collection( $args['slideshow_id'] );

if ( $s903_studios_images->have_posts() ) {
	get_template_part(
        'components/slideshow',
        args: array(
            // ...$args,
            'id'          => "{$args['navigator_id']}-{$args['slideshow_id']}",
            'title'       => $args['slideshow_title'],
            'description' => $args['slideshow_description'],
            'cta'         => $args['slideshow_cta'],
            'images'      => $s903_studios_images->get_posts(),
            'image_field' => 'studio_image_url',
        ),
    );
}

wp_reset_postdata();