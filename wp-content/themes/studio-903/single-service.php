<?php

global $post;

nocache_headers();

$s903_fragment = pll_current_language() === 'pt' ? 'servicos' : 'services';

wp_safe_redirect(
    add_query_arg(
        '_service',
        $post->ID,
        home_url() . '#' . $s903_fragment
    ),
    301
);

exit();
