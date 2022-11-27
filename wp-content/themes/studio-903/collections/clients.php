<?php

$s903_clients_query = new WP_Query(
	array(
		'post_type'      => 'client',
		'posts_per_page' => 30,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_clients_query->have_posts() ) {
	?>
	<div class="clients">
		<ul class="clients__list">
		<?php
		while ( $s903_clients_query->have_posts() ) {
			$s903_clients_query->the_post();

			$s903_client_image = get_field( 'client_image' );
			?>
				<li class="clients__item">
					<a
						href="<?php the_field( 'client_url' ); ?>"
						target="_blank"
						rel="noreferrer noopener"
						title="<?php the_title(); ?>"
						class="clients__link"
					>
						<img
							class="clients__image"
							src="<?php echo $s903_client_image['sizes']['client-thumbnail']; ?>"
							alt="<?php the_title(); ?>"
							loading="lazy"
						/>
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
