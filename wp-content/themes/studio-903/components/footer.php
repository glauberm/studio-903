<div class="footer">
	<div class="footer__main">
		<div class="container">
			<div class="footer__row">

				<div class="footer__favicon">
					<?php get_template_part( 'images/favicon.svg' ); ?>
				</div>

				<div class="footer__nav">
					<div class="footer__menu">
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					</div>

					<div class="footer__contacts">
						<?php get_template_part( 'collections/contacts' ); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="footer__aside">
		<div class="container">
			<p>Copyright &copy; STUDIO 903 - All Rights Reserved. A KM400 Media Company</p>
		</div>
	</div>
</div>
