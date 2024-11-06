<?php

$s903_creators_collection = s903()->creators->collection();

if ($s903_creators_collection->have_posts()) {
    get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                     => 'creator',
            'slideshows'             => $s903_creators_collection->get_posts(),
            'slideshow_cta_field'    => 'creator_cta_label',
            'slideshow_video_field'  => 'creator_video',
            'slideshow_images_field' => 'creator_images',
        ),
    );
}

wp_reset_postdata();
