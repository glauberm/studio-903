<?php

global $post;

nocache_headers();

switch ( get_field( 'contact_type' ) ) {
    case 'whatsapp':
        $s903_contact = 'https://wa.me/' . get_field( 'contact_phone' );
        break;
    case 'phone':
    case 'mobile':
        $s903_contact = 'tel:' . get_field( 'contact_phone' );
        break;
    case 'email':
        $s903_contact = 'mailto:' . get_field( 'contact_email' );
        break;
    case 'address':
        $s903_contact = get_field( 'contact_address' );
        break;
}

wp_redirect( $s903_contact, 301 );

exit();
