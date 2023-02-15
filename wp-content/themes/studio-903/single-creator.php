<?php

global $post;

nocache_headers();

$s903_fragment = pll_current_language() === 'pt' ? 'artistas-e-criadores' : 'artists-and-creators';

wp_safe_redirect(
    add_query_arg(
        '_creator',
        $post->ID,
        home_url() . '#' . $s903_fragment
    ),
    301
);

exit();
