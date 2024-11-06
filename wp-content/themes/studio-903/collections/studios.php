<?php

$s903_studios_collection = s903()->studios->collection();

if ($s903_studios_collection->have_posts()) {
    get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                     => 'studio',
            'slideshows'             => $s903_studios_collection->get_posts(),
            'slideshow_cta_field'    => 'studio_cta_label',
            'slideshow_video_field'  => 'studio_video',
            'slideshow_images_field' => 'studio_images',
        ),
    );
}

wp_reset_postdata();
