<div class="slideshows-navigator">

    <div class="slideshows-navigator__container">
        <ul class="slideshows-navigator__list">
        <?php
        foreach ( $args['slideshows'] as $s903_navigator_slideshow_key => $s903_navigator_slideshow ) :

            $s903_slideshow_id    = $s903_navigator_slideshow->ID;
            $s903_slideshow_title = $s903_navigator_slideshow->post_title;
            ?>
                <li class="navigator__list-slideshow">
                    <input
                        name="<?php s903()->attr( "{$args['id']}-active" ); ?>"
                        id="<?php s903()->attr( "{$args['id']}-{$s903_slideshow_id}-radio" ); ?>"
                        value="<?php s903()->attr( "{$args['id']}-{$s903_slideshow_id}" ); ?>"
                        type="radio"
                        class="slideshows-navigator__radio visually-hidden"
                        <?php 0 === $s903_navigator_slideshow_key ? s903()->attr( 'checked' ) : ''; ?>
                    />
                    <label
                        for="<?php s903()->attr( "{$args['id']}-{$s903_slideshow_id}-radio" ); ?>"
                        class="slideshows-navigator__label"
                    >
                        <img class="slideshows-navigator__label-img" src="" alt="" />
                        <?php s903()->attr( $s903_slideshow_title ); ?>
                    </label>
                </li>
            <?php
        endforeach;
        ?>
        </ul>
    </div>

    <div>
    <?php
    foreach ( $args['slideshows'] as $s903_navigator_slideshow_key => $s903_navigator_slideshow ) :

        $s903_slideshow_id     = $s903_navigator_slideshow->ID;
        $s903_slideshow_title  = $s903_navigator_slideshow->post_title;
        $s903_slideshow_fields = get_fields( $s903_navigator_slideshow->ID );
        ?>
        <div
            id="<?php s903()->attr( "{$args['id']}-{$s903_slideshow_id}" ); ?>"
            class="slideshows-navigator__slideshow
                <?php
                    0 === $s903_navigator_slideshow_key
                        ? s903()->attr( 'slideshows-navigator__slideshow--active' )
                        : '';
                ?>
            "
        >
            <?php
                get_template_part(
                    $args['slideshow_template'],
                    args: array(
                        'navigator_id'          => $args['id'],
                        'slideshow_id'          => $s903_slideshow_id,
                        'slideshow_title'       => $s903_slideshow_title,
                        'slideshow_description' => $s903_slideshow_fields[ $args['slideshow_description_field'] ],
                        'slideshow_cta'         => $s903_slideshow_fields[ $args['slideshow_cta_field'] ],
                    )
                );
            ?>
        </div>
        <?php
    endforeach;
    ?>
    </div>

</div>
