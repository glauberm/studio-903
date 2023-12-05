<?php

global $post;

nocache_headers();

$s903_prefix = pll_current_language() === 'pt' ? 'beneficios' : 'benefits';

wp_safe_redirect( home_url() . "#{$s903_prefix}-{$post->ID}", 301 );

exit();
