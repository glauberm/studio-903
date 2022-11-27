<?php

$s903_socials_query = new WP_Query(
	array(
		'post_type'      => 'social',
		'posts_per_page' => $args['posts_per_page'] ?? 5,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_socials_query->have_posts() ) {
	?>
	<div class="socials">
		<ul class="socials__list">
		<?php
		while ( $s903_socials_query->have_posts() ) {
			$s903_socials_query->the_post();
			?>
				<li class="socials__item">
					<a
						href="<?php the_field( 'social_url' ); ?>"
						target="_blank"
						rel="noreferrer noopener"
						title="<?php the_title(); ?>"
						class="socials__link"
					>
						<?php
						switch ( get_field( 'social_type' ) ) {
							case 'instagram':
								get_template_part( 'images/instagram.svg' );
								break;
							case 'facebook':
								get_template_part( 'images/facebook.svg' );
								break;
							case 'linkedin':
								get_template_part( 'images/linkedin.svg' );
								break;
						}
						?>
					</a>
				</li>
			<?php
		}
		?>
		</ul>
	</div>
	<?php
}

wp_reset_postdata();
