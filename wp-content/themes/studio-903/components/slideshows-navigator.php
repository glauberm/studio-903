<div class="slideshows-navigator">

    <div class="slideshows-navigator__container">
        <ul class="slideshows-navigator__list">
            <?php
            foreach ( $args['slideshows'] as $s903_navigator_slideshow_key => $s903_navigator_slideshow ) :
                $s903_slideshow_id     = $s903_navigator_slideshow->ID;
                $s903_slideshow_title  = $s903_navigator_slideshow->post_title;
                $s903_navigator_active = $_GET[ "_{$args['id']}" ] ?? null;
                ?>
                <li class="slideshows-navigator__list-item">
                    <input
                        name="<?php s903()->attr( "_{$args['id']}" ); ?>"
                        id="<?php s903()->attr( "radio-{$s903_slideshow_id}" ); ?>"
                        value="<?php s903()->attr( "s903-{$s903_slideshow_id}" ); ?>"
                        type="radio"
                        class="slideshows-navigator__radio visually-hidden"
                        <?php
                        (string) $s903_slideshow_id === $s903_navigator_active
                            ? s903()->attr( 'checked' )
                            : ( 0 === $s903_navigator_slideshow_key ? s903()->attr( 'checked' ) : '' );
                        ?>
                    />
                    <label
                        for="<?php s903()->attr( "radio-{$s903_slideshow_id}" ); ?>"
                        class="slideshows-navigator__label"
                    >
                        <?php
                        echo get_the_post_thumbnail(
                            $s903_navigator_slideshow,
                            'slideshow-navigator-thumbnail',
                            array( 'loading' => 'lazy' )
                        );
                        ?>
                        <span>
                            <?php s903()->attr( $s903_slideshow_title ); ?>
                        </span>
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
            $s903_slideshow_id      = $s903_navigator_slideshow->ID;
            $s903_slideshow_title   = $s903_navigator_slideshow->post_title;
            $s903_slideshow_content = $s903_navigator_slideshow->post_content;
            $s903_slideshow_fields  = get_fields( $s903_slideshow_id );
            ?>
            <div
                id="<?php s903()->attr( "s903-{$s903_slideshow_id}" ); ?>"
                class="slideshows-navigator__slideshow
                <?php
                    0 === $s903_navigator_slideshow_key
                        ? s903()->attr( 'slideshows-navigator__slideshow--active' )
                        : '';
                ?>
            ">
                <?php
                get_template_part(
                    $args['slideshow_template'],
                    args: array(
                        'navigator_id'          => $args['id'],
                        'slideshow_id'          => $s903_slideshow_id,
                        'slideshow_slug'        => $s903_navigator_slideshow->post_name,
                        'slideshow_title'       => $s903_slideshow_title,
                        'slideshow_description' => $s903_slideshow_content,
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
