<?php

$s903_creators_query = new WP_Query(
	array(
		'post_type'      => 'creator',
		'posts_per_page' => 10,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_creators_query->have_posts() ) {
	get_template_part(
        'components/slideshows-navigator',
        args: array(
            'id'                          => 's903-creator',
            'slideshows'                  => $s903_creators_query->get_posts(),
            'slideshow_template'          => 'collections/creators-images',
            'slideshow_description_field' => 'creator_description',
            'slideshow_cta_field'         => 'creator_cta_label',
        ),
    );
}

wp_reset_postdata();
