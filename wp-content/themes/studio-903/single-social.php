<?php

global $post;

nocache_headers();

wp_redirect( get_field( 'social_url' ), 301 );
exit();
