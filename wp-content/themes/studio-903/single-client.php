<?php

global $post;

nocache_headers();

wp_redirect( get_field( 'client_url' ), 301 );
exit();
