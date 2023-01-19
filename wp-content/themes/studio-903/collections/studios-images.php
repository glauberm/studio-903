<?php

$s903_studios_images_query = new WP_Query(
	array(
		'post_type'      => 'studio_image',
		'posts_per_page' => 20,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
		'meta_key'       => 'studio_image_studio',
		'meta_value'     => $args['s903_studio_id'],
        'meta_type'      => 'UNSIGNED',
	)
);

if ( $s903_studios_images_query->have_posts() ) {
	?>
	<div
		id="s903-studio-<?php echo $args['s903_studio_id']; ?>-image"
		class="studios-images"
	>
        <div class="studios-images__content">
            <div class="studios-images__heading">
                <h3 class="studios-images__title"><?php echo $args['s903_studio_title']; ?></h3>
                <p class="studios-images__description"><?php echo $args['s903_studio_description']; ?></p>
                <div class="studios-images__action">
                    <button class="studios-images__button" type="button">Verificar disponibilidade</button>
                    <div class="studios-images__popover">
                        <div class="studios-images__box">
                        <?php get_template_part( 'forms/studio' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="studios-images__list-container">
                <ul class="studios-images__list">
                    <?php
                    while ( $s903_studios_images_query->have_posts() ) {
                        global $post;
                        $s903_studios_images_query->the_post();

                        $s903_studio_image_image = get_field( 'studio_image_url' );
                        ?>
                        <li>
                            <input
                                name="s903-studio-<?php echo $args['s903_studio_id']; ?>-image-active"
                                id="s903-studio-<?php echo $args['s903_studio_id']; ?>-image-<?php the_ID(); ?>-radio"
                                type="radio"
                                class="studios-images__radio visually-hidden"
                                value="s903-studio-<?php echo $args['s903_studio_id']; ?>-image-<?php the_ID(); ?>"
                                <?php echo 0 === $s903_studios_images_query->current_post ? 'checked' : ''; ?>
                            />
                            <label
                                for="s903-studio-<?php echo $args['s903_studio_id']; ?>-image-<?php the_ID(); ?>-radio"
                                class="studios-images__label"
                            >
                                <img
                                    src="<?php echo $s903_studio_image_image['sizes']['thumbnail']; ?>"
                                    alt=""
                                    loading="lazy"
                                />
                            </label>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

		<div class="studios-images__gallery">
			<?php
			while ( $s903_studios_images_query->have_posts() ) {
				global $post;
				$s903_studios_images_query->the_post();

				$s903_studio_image_image = get_field( 'studio_image_url' );
				?>
					<div
						id="s903-studio-<?php echo $args['s903_studio_id']; ?>-image-<?php the_ID(); ?>"
						class="
							studios-images__image
							<?php
								echo 0 === $s903_studios_images_query->current_post
									? 'studios-images__image--active'
									: '';
							?>
						"
					>
						<img
							src="<?php echo $s903_studio_image_image['url']; ?>"
							alt=""
							loading="lazy"
						/>
					</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}

wp_reset_postdata();
