<div class="slideshows-navigator">

    <?php
    if (count($args['slideshows']) > 1):
    ?>
        <div class="slideshows-navigator__container">
            <ul class="slideshows-navigator__list">
                <?php

                foreach ($args['slideshows'] as $s903_navigator_slideshow_key => $s903_navigator_slideshow) :
                    $s903_slideshow_id     = $s903_navigator_slideshow->ID;
                    $s903_slideshow_title  = $s903_navigator_slideshow->post_title;
                    $s903_navigator_active = $_GET["_{$args['id']}"] ?? null;
                ?>
                    <li class="slideshows-navigator__list-item">
                        <input
                            name="<?php s903()->attr("_{$args['id']}"); ?>"
                            id="<?php s903()->attr("s903radio-{$s903_slideshow_id}"); ?>"
                            value="<?php s903()->attr("s903-{$s903_slideshow_id}"); ?>"
                            type="radio"
                            class="slideshows-navigator__radio visually-hidden"
                            <?php
                            (string) $s903_slideshow_id === $s903_navigator_active
                                ? s903()->attr('checked')
                                : (0 === $s903_navigator_slideshow_key ? s903()->attr('checked') : '');
                            ?> />
                        <label
                            for="<?php s903()->attr("s903radio-{$s903_slideshow_id}"); ?>"
                            class="slideshows-navigator__label">
                            <span class="slideshows-navigator__label-decorator"></span>
                            <span>
                                <?php s903()->attr($s903_slideshow_title); ?>
                            </span>
                        </label>
                    </li>
                <?php

                endforeach;
                ?>
            </ul>
        </div>
    <?php
    else:
    ?>
        <div class="slideshows-navigator__spacer"></div>
    <?php
    endif;
    ?>

    <div>
        <?php

        foreach ($args['slideshows'] as $s903_navigator_slideshow_key => $s903_navigator_slideshow) :
            $s903_slideshow_id      = $s903_navigator_slideshow->ID;
            $s903_slideshow_title   = $s903_navigator_slideshow->post_title;
            $s903_slideshow_content = $s903_navigator_slideshow->post_content;
            $s903_slideshow_fields  = get_fields($s903_slideshow_id);
        ?>
            <div
                id="<?php s903()->attr("s903-{$s903_slideshow_id}"); ?>"
                class="slideshows-navigator__slideshow
                <?php
                0 === $s903_navigator_slideshow_key
                    ? s903()->attr('slideshows-navigator__slideshow--active')
                    : '';
                ?>
            ">
                <?php

                $s903_video_field = $s903_slideshow_fields[$args['slideshow_video_field']];

                get_template_part(
                    'components/slideshow',
                    args: array(
                        'id'           => "{$args['id']}-{$s903_slideshow_id}",
                        'title'        => $s903_slideshow_title,
                        'description'  => $s903_slideshow_content,
                        'cta'          => $s903_slideshow_fields[$args['slideshow_cta_field']],
                        'images'       => array_filter(
                            $s903_slideshow_fields[$args['slideshow_images_field']],
                            fn($value) => $value !== false,
                        ),
                        'video_file'   => $s903_video_field[$args['slideshow_video_field'] . '_file'],
                        'video_poster' => $s903_video_field[$args['slideshow_video_field'] . '_poster'],
                    ),
                );
                ?>
            </div>
        <?php
        endforeach;
        ?>
    </div>

</div>