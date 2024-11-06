<?php

global $post;

nocache_headers();

wp_safe_redirect(home_url() . '#' . $post->post_name, 301);

exit();
