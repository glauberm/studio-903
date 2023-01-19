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
	<div class="studios">

		<div class="studios__nav-container">
			<ul class="studios__nav">
			<?php
			while ( $s903_studios_query->have_posts() ) {
				global $post;
				$s903_studios_query->the_post();
				?>
					<li class="studios__nav-item">
						<input
							name="s903-studio-active"
							id="s903-studio-<?php the_ID(); ?>-radio"
							type="radio"
							class="studios__radio visually-hidden"
							value="s903-studio-<?php the_ID(); ?>"
							<?php echo 0 === $s903_studios_query->current_post ? 'checked' : ''; ?>
						/>
						<label
                            for="s903-studio-<?php the_ID(); ?>-radio"
                            class="studios__label"
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
					studios__div
					<?php
						echo 0 === $s903_studios_query->current_post
							? 'studios__div--active'
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
