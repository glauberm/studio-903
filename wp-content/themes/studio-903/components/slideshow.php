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
            <ul class="slideshow__list">
                <?php
                foreach ( $args['images'] as $s903_slideshow_image_key => $s903_slideshow_image ) :
                    $s903_image_id = $s903_slideshow_image->ID;
                    $s903_slideshow_active = $_GET[ "_{$args['id']}-" ] ?? null;
                    ?>
                    <li>
                        <input
                            name="<?php s903()->attr( "_{$args['id']}" ); ?>"
                            id="<?php s903()->attr( "radio-{$s903_image_id}" ); ?>"
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
                            for="<?php s903()->attr( "radio-{$s903_image_id}" ); ?>"
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
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
