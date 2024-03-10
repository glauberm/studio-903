<?php

global $post;

nocache_headers();

$s903_creator = s903()->creatorsImages->getcreator( $post );

$s903_fragment = pll_current_language() === 'pt' ? 'artistas-e-criadores' : 'artists-and-creators';

wp_safe_redirect(
    add_query_arg(
        '_creator-' . $s903_creator->ID,
        $post->ID,
        add_query_arg(
            '_creator',
            $s903_creator->ID,
            home_url() . '#' . $s903_fragment
        )
    ),
    301
);

exit();
