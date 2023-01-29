<?php

$s903_services_query = new WP_Query(
	array(
		'post_type'      => 'service',
		'posts_per_page' => 10,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_services_query->have_posts() ) {
	?>
	<div class="navigator">

		<div class="navigator__list-container">
			<ul class="navigator__list">
			<?php
			while ( $s903_services_query->have_posts() ) {
				$s903_services_query->the_post();

				?>
					<li class="navigator__list-item">
						<input
							name="s903-service-active"
							id="s903-service-<?php the_ID(); ?>-radio"
							type="radio"
							class="navigator__radio visually-hidden"
							value="s903-service-<?php the_ID(); ?>"
							<?php echo 0 === $s903_services_query->current_post ? 'checked' : ''; ?>
						/>
						<label
                            for="s903-service-<?php the_ID(); ?>-radio"
                            class="navigator__label"
                        >
							<?php the_title(); ?>
						</label>
					</li>
				<?php
			}
			?>
			</ul>
		</div>

		<div>
		<?php
		while ( $s903_services_query->have_posts() ) {
			$s903_services_query->the_post();

			?>
			<div
				id="s903-service-<?php the_ID(); ?>"
				class="
					navigator__div
					<?php
						echo 0 === $s903_services_query->current_post
							? 'navigator__div--active'
							: '';
					?>
				"
			>
				<?php
					get_template_part(
						'collections/services-images',
						args: array(
                            's903_service_id'          => get_the_ID(),
                            's903_service_title'       => get_the_title(),
                            's903_service_description' => get_field( 'service_description' ),
                        )
					);
				?>
			</div>
			<?php
		}
		?>
		</div>

	</div>
	<?php
}

wp_reset_postdata();
