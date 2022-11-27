<?php

$s903_contacts_query = new WP_Query(
	array(
		'post_type'      => 'contact',
		'posts_per_page' => 10,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_contacts_query->have_posts() ) {
	?>
	<div class="contacts">
		<ul class="contacts__list">
		<?php
		while ( $s903_contacts_query->have_posts() ) {
			$s903_contacts_query->the_post();
			?>
				<li class="contacts__item">
					<address>
						<a
							href="
							<?php
							switch ( get_field( 'contact_type' ) ) {
								case 'whatsapp':
									echo 'https://wa.me/' . get_field( 'contact_phone' );
									break;
								case 'phone':
									echo 'tel:' . get_field( 'contact_phone' );
									break;
								case 'email':
									echo 'mailto:' . get_field( 'contact_mail' );
									break;
							}
							?>
							"
							class="contacts__link contacts__link--<?php the_field( 'contact_type' ); ?>"
						>
							<div class="contacts__icon">
								<?php
								switch ( get_field( 'contact_type' ) ) {
									case 'whatsapp':
										get_template_part( 'images/whatsapp.svg' );
										break;
									case 'phone':
										get_template_part( 'images/phone.svg' );
										break;
									case 'mobile':
										get_template_part( 'images/smartphone.svg' );
										break;
									case 'email':
										get_template_part( 'images/mail.svg' );
										break;
								}
								?>
							</div>
							<div class="contacts__text">
								<?php the_title(); ?>
							</div>
						</a>
					<address>
				</li>
			<?php
		}
		?>
		</ul>
	</div>
	<?php
}

wp_reset_postdata();
