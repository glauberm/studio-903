<?php

$s903_clients_query = new WP_Query(
	array(
		'post_type'      => 'client',
		'posts_per_page' => 20,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_clients_query->have_posts() ) {
	?>
	<div class="clients">

		<div class="clients__group">
			<ul class="clients__list clients__list--first">
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array( 'query' => $s903_clients_query )
				);
			}
			wp_reset_postdata();
			?>
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array(
						'query'       => $s903_clients_query,
						'aria_hidden' => true,
					)
				);
			}
			wp_reset_postdata();
			?>
			</ul>
		</div>

		<div class="clients__group">
			<ul class="clients__list clients__list--reverse">
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array( 'query' => $s903_clients_query )
				);
			}
			wp_reset_postdata();
			?>
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array(
						'query'       => $s903_clients_query,
						'aria_hidden' => true,
					)
				);
			}
			wp_reset_postdata();
			?>
			</ul>
		</div>

		<div class="clients__group">
			<ul class="clients__list">
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array( 'query' => $s903_clients_query )
				);
			}
			wp_reset_postdata();
			?>
			<?php
			while ( $s903_clients_query->have_posts() ) {
				get_template_part(
					'components/client',
					args: array(
						'query'       => $s903_clients_query,
						'aria_hidden' => true,
					)
				);
			}
			wp_reset_postdata();
			?>
			</ul>
		</div>

	</div>
	<?php
}
