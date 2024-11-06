<?php

$s903_services_collection = s903()->services->collection();

if ($s903_services_collection->have_posts()) {
    get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                     => 'service',
            'slideshows'             => $s903_services_collection->get_posts(),
            'slideshow_cta_field'    => 'service_cta_label',
            'slideshow_video_field'  => 'service_video',
            'slideshow_images_field' => 'service_images',
        ),
    );
}

wp_reset_postdata();
