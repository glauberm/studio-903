<?php

abstract class S903_Abstract_Post_Type extends S903_Abstract_Menuable {
	protected $id;
	protected $label;
	protected $custom_columns;
	protected $supports = array(
		'title',
		'page-attributes',
	);

	public function __construct( $has_menu = false, $is_submenu = false, $menu_function = '' ) {
		add_action( 'init', array( $this, 'register' ) );

		if ( $this->custom_columns ) {
			add_action(
				'manage_' . $this->id . '_posts_custom_column',
				array( $this, 'get_custom_columns' )
			);
			add_filter(
				'manage_' . $this->id . '_posts_columns',
				array( $this, 'custom_columns' )
			);
		}

		$this->menu_label = $this->label;

		parent::__construct( $has_menu, $is_submenu, $menu_function );
	}

	public function register() {
		register_post_type(
			post_type: $this->id,
			args: array(
				'label'        => $this->label,
				'public'       => false,
				'show_ui'      => true,
				'rewrite'      => false,
				'show_in_menu' => $this->menu,
				'supports'     => $this->supports,
			)
		);
	}
}
