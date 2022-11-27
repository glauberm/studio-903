<?php

class S903_Social_Post_Type extends S903_Abstract_Post_Type {
	protected $id        = 'social';
	protected $label     = 'Social media profiles';
	protected $menu      = 'social';
	protected $menu_icon = 'dashicons-share';
	protected $supports  = array(
		'title',
		'revisions',
	);
}
