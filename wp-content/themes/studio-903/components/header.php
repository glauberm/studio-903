<div class="header">
	<a class="header__logo" href="<?php echo bloginfo( 'wpurl' ); ?>">
		<?php get_template_part( 'images/logo.svg' ); ?>
	</a>

	<div class="header__menu">
		<?php get_template_part( 'components/menu' ); ?>
	</div>

	<div class="header__socials">
		<?php
		get_template_part(
			'collections/socials',
			args: array(
				'posts_per_page' => 1,
			)
		);
		?>
	</div>

	<div class="header__lang-switcher">
		<?php get_template_part( 'components/language-switcher' ); ?>
	</div>

</div>
