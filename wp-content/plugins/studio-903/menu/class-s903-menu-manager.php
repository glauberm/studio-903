<?php

class S903_Menu_Manager {
	public $position = 25;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'remove' ) );
	}

	public function add_menu( $label, $capability, $slug, $icon, $function = '' ) {
		add_action(
			'admin_menu',
			add_menu_page(
				$label, // page_title
				$label,  // menu_title
				$capability, // capability
				$slug, // menu_slug
				$function, // function
				$icon, // icon_url
				$this->position // position
			)
		);

		$this->position++;
	}

	public function add_submenu( $parent, $label, $capability, $slug, $function = '' ) {
		add_action(
			'admin_menu',
			add_submenu_page(
				$parent, // parent_slug
				$label, // page_title
				$label,  // menu_title
				$capability, // capability
				$slug, // menu_slug
				$function // function
			)
		);
	}

	public function remove() {
		remove_menu_page( 'edit.php' ); // Posts
		// remove_menu_page( 'upload.php' ); // Media
		// remove_menu_page( 'edit.php?post_type=page' ); // Pages
		remove_menu_page( 'edit-comments.php' ); // Comments
		// remove_menu_page( 'themes.php' ); // Appearance
		// remove_menu_page( 'plugins.php' ); // Plugins
		// remove_menu_page( 'users.php' ); // Users
		// remove_menu_page( 'tools.php' ); // Tools
		// remove_menu_page( 'options-general.php' ); // Settings
		// remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF
	}
}
