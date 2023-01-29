<?php

$s903_studios_query = new WP_Query(
	array(
		'post_type'      => 'studio',
		'posts_per_page' => 10,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_studios_query->have_posts() ) {
	?>
	<div class="navigator">

		<div class="navigator__container">
			<ul class="navigator__list">
			<?php
			while ( $s903_studios_query->have_posts() ) {
				global $post;

				$s903_studios_query->the_post();
				?>
					<li class="navigator__list-item">
						<input
							name="s903-studio-active"
							id="s903-studio-<?php the_ID(); ?>-radio"
                            value="s903-studio-<?php the_ID(); ?>"
							type="radio"
							class="navigator__radio visually-hidden"
							<?php echo 0 === $s903_studios_query->current_post ? 'checked' : ''; ?>
						/>
						<label
                            for="s903-studio-<?php the_ID(); ?>-radio"
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
		while ( $s903_studios_query->have_posts() ) {
			global $post;
			$s903_studios_query->the_post();
			?>
			<div
				id="s903-studio-<?php the_ID(); ?>"
				class="
                    navigator__div
					<?php
						echo 0 === $s903_studios_query->current_post
							? 'navigator__div--active'
							: '';
					?>
				"
			>
				<?php
					get_template_part(
						'collections/studios-images',
						args: array(
                            's903_studio_id'          => get_the_ID(),
                            's903_studio_title'       => get_the_title(),
                            's903_studio_description' => get_field( 'studio_description' ),
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
