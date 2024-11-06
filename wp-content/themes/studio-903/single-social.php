<?php

global $post;

nocache_headers();

// phpcs:ignore WordPress.Security.SafeRedirect
wp_redirect(get_field('social_url'), 301);

exit();
