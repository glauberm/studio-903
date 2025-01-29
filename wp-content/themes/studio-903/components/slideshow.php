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
                    name="<?php s903()->attr("cta-{$args['id']}"); ?>"
                    id="<?php s903()->attr("checkbox-{$args['id']}"); ?>"
                    value="<?php s903()->attr("form-{$args['id']}"); ?>"
                    type="checkbox"
                    class="slideshow__checkbox visually-hidden" />

                <label
                    for="<?php s903()->attr("checkbox-{$args['id']}"); ?>"
                    class="button slideshow__label">
                    <?php s903()->html($args['cta']); ?>
                </label>

                <div class="popover slideshow__popover">
                    <?php

                    get_template_part(
                        'components/form',
                        args: array(
                            'id'           => $args['id'],
                            'close_target' => "checkbox-{$args['id']}",
                            'source'       => wp_strip_all_tags($args['title']),
                        )
                    );
                    ?>
                </div>
            </div>

        </div>

        <div class="slideshow__list-container">
            <ul class="slideshow__list">
                <?php

                $s903_slideshow_image_keys = array_keys($args['images']);
                $s903_slideshow_image_values = array_values($args['images']);

                for ($i = 0; $i < count($args['images']); $i++) :
                    $s903_image_id = $s903_slideshow_image_values[$i];
                    $s903_slideshow_active = $_GET["_{$args['id']}-"] ?? null;
                ?>
                    <li>
                        <input
                            name="<?php s903()->attr("_{$args['id']}"); ?>"
                            id="<?php s903()->attr("s903-radio-{$s903_image_id}"); ?>"
                            value="<?php s903()->attr("s903-{$s903_image_id}"); ?>"
                            type="radio"
                            class="slideshow__radio visually-hidden"
                            <?php
                            (string) $s903_image_id === $s903_slideshow_active
                                ? s903()->attr('checked')
                                : ($s903_slideshow_image_keys[$i] === $s903_slideshow_image_keys[0]
                                    ? s903()->attr('checked')
                                    : '');
                            ?> />
                        <label
                            for="<?php s903()->attr("s903-radio-{$s903_image_id}"); ?>"
                            class="slideshow__thumbnail"
                            aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Mostrar imagem' : 'Show image') ?>">
                            <?php

                            echo wp_get_attachment_image(
                                $s903_image_id,
                                size: 'slideshow-thumbnail',
                                attr: ['loading' => 'lazy'],
                            );
                            ?>
                        </label>
                    </li>
                <?php

                endfor;

                if ($args['video_file']) :
                    $s903_video_poster_id = $args['video_poster'];
                ?>
                    <li>
                        <input
                            name="<?php s903()->attr("_{$args['id']}"); ?>"
                            id="<?php s903()->attr("s903-radio-{$s903_video_poster_id}"); ?>"
                            value="<?php s903()->attr("s903-{$s903_video_poster_id}"); ?>"
                            type="radio"
                            class="slideshow__radio visually-hidden" />

                        <label
                            for="<?php s903()->attr("s903-radio-{$s903_video_poster_id}"); ?>"
                            class="slideshow__thumbnail"
                            aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Mostrar vídeo' : 'Show video') ?>">
                            <?php

                            echo wp_get_attachment_image(
                                $s903_video_poster_id,
                                size: 'slideshow-thumbnail',
                                attr: ['loading' => 'lazy'],
                            );
                            ?>

                            <span class="slideshow__thumbnail-play">
                                <?php get_template_part('images/play.svg'); ?>
                            </span>
                        </label>
                    </li>
                <?php

                endif;
                ?>
            </ul>
        </div>
    </div>

    <div class="slideshow__gallery">
        <?php

        $s903_slideshow_image_keys = array_keys($args['images']);
        $s903_slideshow_image_values = array_values($args['images']);

        for ($i = 0; $i < count($args['images']); $i++) :
            $s903_image_id = $s903_slideshow_image_values[$i];

            if ($i !== 0) {
                $s903_prev_image_id = $args['images'][$s903_slideshow_image_keys[$i - 1]];
            } else {
                $s903_prev_image_id = $args['video_file']
                    ? $args['video_poster']
                    : $args['images'][$s903_slideshow_image_keys[count($args['images']) - 1]];
            }

            if ($i !== count($args['images']) - 1) {
                $s903_next_image_id = $args['images'][$s903_slideshow_image_keys[$i + 1]];
            } else {
                $s903_next_image_id = $args['video_file']
                    ? $args['video_poster']
                    : $args['images'][$s903_slideshow_image_keys[0]];
            }
        ?>
            <div
                id="<?php s903()->attr("s903-{$s903_image_id}"); ?>"
                class="slideshow__image <?php $i === 0 ? s903()->attr('slideshow__image--active') : ''; ?>"
                data-media-type="image">

                <input
                    type="radio"
                    name="<?php s903()->attr("_modal_{$args['id']}"); ?>"
                    id="<?php s903()->attr("s903-{$s903_image_id}-modal"); ?>"
                    value="<?php s903()->attr("s903-modal-{$s903_image_id}"); ?>"
                    class="slideshow__modal-radio visually-hidden" />

                <label
                    for="<?php s903()->attr("s903-{$s903_image_id}-modal"); ?>"
                    class="slideshow__modal-radio-label"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Mostrar imagem completa' : 'Show full image') ?>">
                    <?php
                    echo wp_get_attachment_image(
                        $s903_image_id,
                        size: 'slideshow-image',
                        attr: [
                            'srcset'  => wp_get_attachment_image_url($s903_image_id, 'slideshow-image') . ' 720w, ' .
                                wp_get_attachment_image_url($s903_image_id, 'slideshow-image-lg') . ' 1440w',
                            'sizes'   => '(max-width: 767px) 720px, 1440px',
                            'loading' => 'lazy',
                        ]
                    );
                    ?>
                </label>
            </div>

            <div role="dialog" aria-modal="true"
                id="<?php s903()->attr("s903-modal-{$s903_image_id}"); ?>"
                class="slideshow__modal"
                data-media-type="image">

                <button
                    type="button"
                    class="slideshow__modal-bg"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_image_id}"); ?>"
                    tabindex="-1"
                    aria-hidden="true">
                </button>

                <button
                    type="button"
                    class="slideshow__modal-close"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_image_id}"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Fechar imagem completa' : 'Close full image') ?>">
                    <?php get_template_part('images/close.svg'); ?>
                </button>

                <?php

                echo wp_get_attachment_image(
                    $s903_image_id,
                    size: 'full',
                    attr: ['loading' => 'lazy'],
                );
                ?>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--prev"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_prev_image_id}"); ?>"
                    data-modal-radio-id="<?php s903()->attr("s903-{$s903_prev_image_id}-modal"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Anterior' : 'Previous') ?>">
                    <?php get_template_part('images/chevron-left.svg'); ?>
                </button>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--next"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_next_image_id}"); ?>"
                    data-modal-radio-id="<?php s903()->attr("s903-{$s903_next_image_id}-modal"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Seguinte' : 'Next') ?>">
                    <?php get_template_part('images/chevron-right.svg'); ?>
                </button>
            </div>
        <?php

        endfor;

        if ($args['video_file']) :
            $s903_prev_image_id = $s903_slideshow_image_values[count($args['images']) - 1];
            $s903_next_image_id = $s903_slideshow_image_values[0];

            $s903_video_id = $args['video_file']['id'];
            $s903_video_url = $args['video_file']['url'];
            $s903_video_poster_id = $args['video_poster'];
        ?>
            <div
                id="<?php s903()->attr("s903-{$s903_video_poster_id}"); ?>"
                class="slideshow__image"
                data-media-type="video">

                <input
                    type="radio"
                    name="<?php s903()->attr("_modal_{$args['id']}"); ?>"
                    id="<?php s903()->attr("s903-{$s903_video_poster_id}-modal"); ?>"
                    value="<?php s903()->attr("s903-modal-{$s903_video_poster_id}"); ?>"
                    class="slideshow__modal-radio visually-hidden" />

                <label
                    for="<?php s903()->attr("s903-{$s903_video_poster_id}-modal"); ?>"
                    class="slideshow__modal-radio-label"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Mostrar vídeo completo' : 'Show full video') ?>">

                    <video
                        tabindex="-1"
                        autoplay
                        loop
                        muted
                        playsinline
                        src=""
                        data-src="<?php echo $s903_video_url; ?>"
                        poster="<?php echo wp_get_attachment_image_url($s903_video_poster_id, 'full'); ?>">
                    </video>

                </label>
            </div>

            <div role="dialog" aria-modal="true"
                id="<?php s903()->attr("s903-modal-{$s903_video_poster_id}"); ?>"
                class="slideshow__modal"
                data-media-type="video">

                <button
                    type="button"
                    class="slideshow__modal-bg"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_video_poster_id}"); ?>"
                    tabindex="-1"
                    aria-hidden="true">
                </button>

                <button
                    type="button"
                    class="slideshow__modal-close"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_video_poster_id}"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Fechar vídeo completo' : 'Close full video') ?>">
                    <?php get_template_part('images/close.svg'); ?>
                </button>

                <video
                    tabindex="-1"
                    autoplay
                    loop
                    muted
                    playsinline
                    controls
                    src=""
                    data-src="<?php echo $s903_video_url; ?>"
                    poster="<?php echo wp_get_attachment_image_url($s903_video_poster_id, 'full'); ?>">
                </video>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--prev"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_prev_image_id}"); ?>"
                    data-modal-radio-id="<?php s903()->attr("s903-{$s903_prev_image_id}-modal"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Anterior' : 'Previous') ?>">
                    <?php get_template_part('images/chevron-left.svg'); ?>
                </button>

                <button
                    type="button"
                    class="slideshow__modal-nav slideshow__modal-nav--next"
                    data-thumbnail-radio-id="<?php s903()->attr("s903-radio-{$s903_next_image_id}"); ?>"
                    data-modal-radio-id="<?php s903()->attr("s903-{$s903_next_image_id}-modal"); ?>"
                    aria-label="<?php s903()->attr(pll_current_language() === 'pt' ? 'Seguinte' : 'Next') ?>">
                    <?php get_template_part('images/chevron-right.svg'); ?>
                </button>
            </div>
        <?php

        endif;
        ?>
    </div>
</div>