<?php

defined( 'S903_FILMS_ABSPATH' ) || die();

require_once S903_FILMS_ABSPATH . 'post-types/class-s903-abstract-post-type.php';
require_once S903_FILMS_ABSPATH . 'post-types/class-s903-about-sections-post-type.php';
require_once S903_FILMS_ABSPATH . 'post-types/class-s903-clients-post-type.php';
require_once S903_FILMS_ABSPATH . 'post-types/class-s903-contact-post-type.php';
require_once S903_FILMS_ABSPATH . 'post-types/class-s903-social-post-type.php';

new S903_About_Sections_Post_Type( has_menu: true );
new S903_Clients_Post_Type( has_menu: true );
new S903_Contact_Post_Type( has_menu: true );
new S903_Social_Post_Type( has_menu: true );
