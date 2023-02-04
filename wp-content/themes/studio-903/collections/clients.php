<?php

$s903_client_collection = s903()->clients->collection();

if ( $s903_client_collection->have_posts() ) {
    function s903_client_item( array $args ): void {
        ?>
        <li
            class="clients__item"
            <?php
                array_key_exists( 'aria_hidden', $args ) && $args['aria_hidden']
                    ? 'aria-hidden="true"'
                    : '';
            ?>
        >
            <a
                href="<?php the_field( 'client_url' ); ?>"
                target="_blank"
                rel="noreferrer noopener"
                title="<?php the_title(); ?>"
                class="clients__link"
                tabindex="-1"
            >
                <img
                    class="clients__image"
                    src="
                    <?php
                        s903()->attr(
                            get_field( 'client_image' )['sizes']['client-thumbnail']
                        );
                    ?>
                    "
                    alt="<?php the_title(); ?>"
                    loading="lazy"
                />
            </a>
        </li>
        <?php
    }

    ?>

	<div class="clients">
    <?php
    for ( $s903_i = 0; $s903_i < 3; $s903_i++ ) {
        ?>
		<div class="clients__group">
			<ul class="<?php s903()->attr( "clients__list clients__list--{$s903_i}" ); ?>">
			<?php

			while ( $s903_client_collection->have_posts() ) {
                $s903_client_collection->the_post();
				s903_client_item( $args );
			}

			while ( $s903_client_collection->have_posts() ) {
                $s903_client_collection->the_post();
				s903_client_item( $args );
			}

			?>
			</ul>
		</div>
        <?php
    }
    ?>
	</div>

	<?php
}

wp_reset_postdata();
