<?php

global $post;

nocache_headers();

$s903_service = s903()->servicesImages->getservice( $post );

$s903_fragment = pll_current_language() === 'pt' ? 'servicos' : 'services';

wp_safe_redirect(
    add_query_arg(
        '_service-' . $s903_service->ID,
        $post->ID,
        add_query_arg(
            '_service',
            $s903_service->ID,
            home_url() . '#' . $s903_fragment
        )
    ),
    301
);

exit();
