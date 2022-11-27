<?php

class S903_About_Sections_Post_Type extends S903_Abstract_Post_Type {
	protected $id        = 'about-sections';
	protected $label     = 'About sections';
	protected $menu      = 'about-sections';
	protected $menu_icon = 'dashicons-id';
	protected $supports  = array(
		'title',
		'revisions',
	);
}
