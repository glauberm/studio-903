<?php
global $wp_query;

$wp_query->set_404();
status_header( 404 );
nocache_headers();

require_once get_template_directory() . '/404.php';

// wp_redirect( string $location, int $status = 302, string $x_redirect_by = 'WordPress' )
// exit;
