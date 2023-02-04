<div
    id="<?php s903()->attr( $args['id'] ); ?>"
    class="slideshow"
>
    <div class="slideshow__content">
        <div class="slideshow__heading">

            <h3 class="slideshow__title">
                <?php s903()->html( $args['title'] ); ?>
            </h3>

            <p class="slideshow__description">
                <?php s903()->html( $args['description'] ); ?>
            </p>

            <div class="slideshow__action">
                <input
                    name="<?php s903()->attr( "{$args['id']}-cta" ); ?>"
                    id="<?php s903()->attr( "{$args['id']}-checkbox" ); ?>"
                    value="<?php s903()->attr( "{$args['id']}-form" ); ?>"
                    type="checkbox"
                    class="slideshow__checkbox visually-hidden"
                />
                <label
                    for="<?php s903()->attr( "{$args['id']}-checkbox" ); ?>"
                    class="slideshow__label"
                >
                    <?php s903()->html( $args['cta'] ); ?>
                </label>

                <div class="slideshow__popover">
                    <div class="slideshow__box">
                        <?php get_template_part( 'components/form' ); ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="slideshow__list-container">
            <ul class="slideshow__list">
                <?php
                foreach ( $args['images'] as $s903_slideshow_image_key => $s903_slideshow_image ) :

                    $s903_image_id    = $s903_slideshow_image->ID;
                    $s903_image_image = get_fields( $s903_image_id )[ $args['image_field'] ];
                    ?>
                    <li>
                        <input
                            name="<?php s903()->attr( "{$args['id']}-active" ); ?>"
                            id="<?php s903()->attr( "{$args['id']}-{$s903_image_id}-radio" ); ?>"
                            value="<?php s903()->attr( "{$args['id']}-{$s903_image_id}" ); ?>"
                            type="radio"
                            class="slideshow__radio visually-hidden"
                            <?php 0 === $s903_slideshow_image_key ? s903()->attr( 'checked' ) : ''; ?>
                        />
                        <label for="<?php s903()->attr( "{$args['id']}-{$s903_image_id}-radio" ); ?>">
                            <img
                                src="<?php s903()->attr( $s903_image_image['sizes']['thumbnail'] ); ?>"
                                alt=""
                                loading="lazy"
                                class="slideshow__label-img"
                            />
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

            $s903_image_id    = $s903_slideshow_image->ID;
            $s903_image_image = get_fields( $s903_image_id )[ $args['image_field'] ];
            ?>
                <div
                    id="<?php s903()->attr( "{$args['id']}-{$s903_image_id}" ); ?>"
                    class="slideshow__image
                        <?php
                            0 === $s903_slideshow_image_key
                                ? s903()->attr( 'slideshow__image--active' )
                                : ''
                        ?>
                    "
                >
                    <img
                        src="<?php s903()->attr( $s903_image_image['sizes']['large'] ); ?>"
                        alt=""
                        loading="lazy"
                    />
                </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
