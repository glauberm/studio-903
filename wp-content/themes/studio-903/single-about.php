<?php

global $post;

nocache_headers();

$s903_prefix = pll_current_language() === 'pt' ? 'sobre' : 'about';

wp_safe_redirect(home_url() . "#{$s903_prefix}-{$post->ID}", 301);

exit();
