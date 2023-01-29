<?php

$s903_creators_images_query = new WP_Query(
	array(
		'post_type'      => 'creator_image',
		'posts_per_page' => 20,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
		'meta_key'       => 'creator_image_creator',
		'meta_value'     => $args['s903_creator_id'],
        'meta_type'      => 'UNSIGNED',
	)
);

if ( $s903_creators_images_query->have_posts() ) {
	?>
	<div
		id="s903-creator-<?php echo $args['s903_creator_id']; ?>-image"
		class="slideshow"
	>
        <div class="slideshow__content">

            <div class="slideshow__heading">
                <h3 class="slideshow__title">
                    <?php echo $args['s903_creator_title']; ?>
                </h3>

                <p class="slideshow__description">
                    <?php echo $args['s903_creator_description']; ?>
                </p>

                <div class="slideshow__action">
                    <button class="slideshow__button" type="button">Verificar disponibilidade</button>
                    <div class="slideshow__popover">
                        <div class="slideshow__box">
                        <?php get_template_part( 'forms/creator' ); ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slideshow__list-container">
                <ul class="slideshow__list">
                    <?php
                    while ( $s903_creators_images_query->have_posts() ) {
                        global $post;
                        $s903_creators_images_query->the_post();

                        $s903_creator_image_image = get_field( 'creator_image_url' );
                        ?>
                        <li>
                            <input
                                name="s903-creator-<?php echo $args['s903_creator_id']; ?>-image-active"
                                id="s903-creator-<?php echo $args['s903_creator_id']; ?>-image-<?php the_ID(); ?>-radio"
                                type="radio"
                                class="slideshow__radio visually-hidden"
                                value="s903-creator-<?php echo $args['s903_creator_id']; ?>-image-<?php the_ID(); ?>"
                                <?php echo 0 === $s903_creators_images_query->current_post ? 'checked' : ''; ?>
                            />
                            <label
                                for="s903-creator-<?php echo $args['s903_creator_id']; ?>-image-<?php the_ID(); ?>-radio"
                                class="slideshow__label"
                            >
                                <img
                                    src="<?php echo $s903_creator_image_image['sizes']['thumbnail']; ?>"
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

		<div class="slideshow__gallery">
			<?php
			while ( $s903_creators_images_query->have_posts() ) {
				global $post;
				$s903_creators_images_query->the_post();

				$s903_creator_image_image = get_field( 'creator_image_url' );
				?>
					<div
						id="s903-creator-<?php echo $args['s903_creator_id']; ?>-image-<?php the_ID(); ?>"
						class="
							slideshow__image
							<?php
								echo 0 === $s903_creators_images_query->current_post
									? 'slideshow__image--active'
									: '';
							?>
						"
					>
						<img
							src="<?php echo $s903_creator_image_image['url']; ?>"
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
