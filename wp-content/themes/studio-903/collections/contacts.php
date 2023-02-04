<?php

$s903_contact_collection = s903()->contacts->collection();

if ( $s903_contact_collection->have_posts() ) {
	?>
	<div class="contacts">
		<ul class="contacts__list">
		<?php
		while ( $s903_contact_collection->have_posts() ) {
			$s903_contact_collection->the_post();
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
								case 'mobile':
									echo 'tel:' . get_field( 'contact_phone' );
									break;
								case 'email':
									echo 'mailto:' . get_field( 'contact_email' );
									break;
								case 'address':
									the_field( 'contact_address' );
									break;
							}
							?>
							"
							target="_blank"
							rel="noreferrer noopener"
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
									case 'address':
										get_template_part( 'images/address.svg' );
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
