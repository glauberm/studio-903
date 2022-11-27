<?php

class S903_Contact_Post_Type extends S903_Abstract_Post_Type {
	protected $id        = 'contact';
	protected $label     = 'Contacts';
	protected $menu      = 'contact';
	protected $menu_icon = 'dashicons-email';
	protected $supports  = array(
		'title',
		'revisions',
	);
}
