<?php

abstract class S903_Abstract_Menuable {
	protected $menu;
	protected $menu_label;
	protected $menu_capability = 'edit_posts';
	protected $menu_icon;
	protected $menu_function;
	protected $menu_parent;

	public function __construct( $has_menu = false, $is_submenu = false, $menu_function = null ) {
		if ( $has_menu ) {
			add_action( 'admin_menu', array( $this, 'add_menu' ) );
		}

		if ( $is_submenu ) {
			add_action( 'admin_menu', array( $this, 'add_submenu' ) );
		}

		if ( $menu_function ) {
			$this->menu_function = array( $this, $menu_function );
		}
	}

	public function add_menu() {
		global $s903_menu_manager;

		$s903_menu_manager->add_menu(
			label: $this->menu_label,
			capability: $this->menu_capability,
			slug: $this->menu,
			icon: $this->menu_icon,
			function: $this->menu_function
		);
	}

	public function add_submenu() {
		global $s903_menu_manager;

		$s903_menu_manager->add_submenu(
			parent: $this->menu_parent,
			label: $this->menu_label,
			capability: $this->menu_capability,
			slug: $this->menu,
			function: $this->menu_function
		);
	}
}
