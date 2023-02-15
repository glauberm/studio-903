<?php

global $post;

nocache_headers();

$s903_fragment = pll_current_language() === 'pt' ? 'estudio' : 'studio';

wp_safe_redirect(
    add_query_arg(
        '_studio',
        $post->ID,
        home_url() . '#' . $s903_fragment
    ),
    301
);

exit();
