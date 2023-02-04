<?php

$s903_services_collection = s903()->services->collection();

if ( $s903_services_collection->have_posts() ) {
	get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                          => 's903-service',
            'slideshows'                  => $s903_services_collection->get_posts(),
            'slideshow_template'          => 'collections/services-images',
            'slideshow_description_field' => 'service_description',
            'slideshow_cta_field'         => 'service_cta_label',
        ),
    );
}

wp_reset_postdata();
