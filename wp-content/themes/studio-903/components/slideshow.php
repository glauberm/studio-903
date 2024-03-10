<div class="slideshow">
    <div class="slideshow__content">
        <div class="slideshow__heading">

            <h3 class="slideshow__title">
                <?php echo $args['title']; ?>
            </h3>

            <p class="slideshow__description">
                <?php echo $args['description']; ?>
            </p>

            <div class="slideshow__action">
                <input
                    name="<?php s903()->attr( "cta-{$args['id']}" ); ?>"
                    id="<?php s903()->attr( "checkbox-{$args['id']}" ); ?>"
                    value="<?php s903()->attr( "form-{$args['id']}" ); ?>"
                    type="checkbox"
                    class="slideshow__checkbox visually-hidden"
                />

                <label
                    for="<?php s903()->attr( "checkbox-{$args['id']}" ); ?>"
                    class="button slideshow__label"
                >
                    <?php s903()->html( $args['cta'] ); ?>
                </label>

                <div class="popover slideshow__popover">
                    <?php
                        get_template_part(
                            'components/form',
                            args: array(
                                'id'           => $args['id'],
                                'close_target' => "checkbox-{$args['id']}",
                                'source'       => wp_strip_all_tags( $args['title'] ),
                            )
                        );
                        ?>
                </div>
            </div>

        </div>

        <div class="slideshow__list-container">
            <ul class="slideshow__list <?php s903()->attr( count($args['images']) > 9 ? "slideshow__list--square" : "" ); ?>">
                <?php
                foreach ( $args['images'] as $s903_slideshow_image_key => $s903_slideshow_image ) :
                    $s903_image_id = $s903_slideshow_image->ID;
                    $s903_slideshow_active = $_GET[ "_{$args['id']}-" ] ?? null;
                    ?>
                    <li>
                        <input
                            name="<?php s903()->attr( "_{$args['id']}" ); ?>"
                            id="<?php s903()->attr( "s903-radio-{$s903_image_id}" ); ?>"
                            value="<?php s903()->attr( "s903-{$s903_image_id}" ); ?>"
                            type="radio"
                            class="slideshow__radio visually-hidden"
                            <?php
                            (string) $s903_image_id === $s903_slideshow_active
                                ? s903()->attr( 'checked' )
                                : ( 0 === $s903_slideshow_image_key ? s903()->attr( 'checked' ) : '' );
                            ?>
                        />
                        <label
                            for="<?php s903()->attr( "s903-radio-{$s903_image_id}" ); ?>"
                            class="slideshow__thumbnail"
                        >
                            <?php
                            echo get_the_post_thumbnail(
                                $s903_slideshow_image,
                                'slideshow-thumbnail',
                                array( 'loading' => 'lazy' )
                            );
                            ?>
                        </label>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
        </div>
    </div>

    <div class="slideshow__gallery">
        <?php
        foreach ( $args['images'] as $s903_slideshow_image_key => $s903_slideshow_image ) :
            $s903_image_id = $s903_slideshow_image->ID;

            $s903_prev_image_id = 0 < $s903_slideshow_image_key
                ? $args['images'][$s903_slideshow_image_key - 1]->ID
                : $args['images'][count($args['images']) - 1]->ID;

            $s903_next_image_id = count($args['images']) > $s903_slideshow_image_key + 1
                ? $args['images'][$s903_slideshow_image_key + 1]->ID
                : $args['images'][0]->ID;
            ?>
            <div
                id="<?php s903()->attr( "s903-{$s903_image_id}" ); ?>"
                class="slideshow__image
                <?php
                    0 === $s903_slideshow_image_key
                        ? s903()->attr( 'slideshow__image--active' )
                        : '';
                ?>
            ">
                <input
                    type="radio"
                    name="<?php s903()->attr( "_modal_{$args['id']}" ); ?>"
                    id="<?php s903()->attr( "s903-{$s903_image_id}-modal" ); ?>"
                    value="<?php s903()->attr( "s903-modal-{$s903_image_id}" ); ?>"
                    class="slideshow__modal-radio visually-hidden"
                />

                <label
                    for="<?php s903()->attr( "s903-{$s903_image_id}-modal" ); ?>"
                    class="slideshow__modal-radio-label"
                    aria-label="Show full image"
                >
                    <?php
                    echo get_the_post_thumbnail(
                        $s903_slideshow_image,
                        'slideshow-image',
                        array(
                            'srcset'  => get_the_post_thumbnail_url( $s903_slideshow_image, 'slideshow-image' ) . ' 720w, ' .
                                        get_the_post_thumbnail_url( $s903_slideshow_image, 'slideshow-image-lg' ) . ' 1440w',
                            'sizes'   => '(max-width: 767px) 720px, 1440px',
                            'loading' => 'lazy',
                        )
                    );
                    ?>
                </label>
            </div>

            <div id="<?php s903()->attr( "s903-modal-{$s903_image_id}" ); ?>" class="slideshow__modal">
                <button
                    type="button"
                    class="slideshow__modal-bg"
                    aria-label="Close full image"
                >
                </button>

                <button
                    type="button"
                    class="slideshow__modal-close"
                    aria-label="Close full image"
                >
                    <?php get_template_part( 'images/close.svg' ); ?>
                </button>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--prev"
                    data-thumbnail-radio-id="<?php s903()->attr( "s903-radio-{$s903_prev_image_id}" ); ?>"
                    data-modal-radio-id="<?php s903()->attr( "s903-{$s903_prev_image_id}-modal" ); ?>"
                    aria-label="Previous"
                >
                    <?php get_template_part( 'images/chevron-left.svg' ); ?>
                </button>

                <?php echo get_the_post_thumbnail($s903_slideshow_image, 'full'); ?>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--next"
                    data-thumbnail-radio-id="<?php s903()->attr( "s903-radio-{$s903_next_image_id}" ); ?>"
                    data-modal-radio-id="<?php s903()->attr( "s903-{$s903_next_image_id}-modal" ); ?>"
                    aria-label="Next"
                >
                <?php get_template_part( 'images/chevron-right.svg' ); ?>
                </button>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
