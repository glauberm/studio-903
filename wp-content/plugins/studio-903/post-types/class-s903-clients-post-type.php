<?php

class S903_Clients_Post_Type extends S903_Abstract_Post_Type {
	protected $id        = 'client';
	protected $label     = 'Clients';
	protected $menu      = 'client';
	protected $menu_icon = 'dashicons-building';
	protected $supports  = array(
		'title',
		'revisions',
		'page-attributes',
	);
}
