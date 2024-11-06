<div
    id="cover"
    class="cover active">
    <div class="cover__bg">
        <video
            tabindex="-1"
            autoplay
            loop
            muted
            playsinline
            src="<?php s903()->attr($args['video']); ?>"
            class="cover__video"
            poster="<?php s903()->attr($args['poster']); ?>">
        </video>
    </div>

    <div class="container">
        <div class="cover__container">

            <h1 class="cover__title">
                <?php s903()->html($args['title']); ?>
            </h1>

            <p class="cover__content">
                <?php s903()->html($args['content']); ?>
            </p>

            <?php
            if ($args['primary_cta'] || $args['secondary_cta']) :
            ?>
                <div class="cover__ctas">

                    <?php
                    if ($args['primary_cta']) :
                    ?>
                        <input
                            name="cover-cta"
                            id="cover-cta"
                            type="checkbox"
                            class="cover__checkbox visually-hidden" />

                        <label
                            for="cover-cta"
                            class="button button--big button--filled cover__primary-cta">
                            <?php s903()->html($args['primary_cta']); ?>
                        </label>

                        <div class="popover cover__popover">
                            <div class="cover__box">
                                <?php
                                get_template_part(
                                    'components/form',
                                    args: array(
                                        'id'           => 'cover',
                                        'close_target' => 'cover-cta',
                                        'source'       => wp_strip_all_tags($args['title']),
                                    )
                                );
                                ?>
                            </div>
                        </div>

                    <?php
                    endif;
                    ?>

                    <?php
                    if ($args['secondary_cta']) {
                        get_template_part(
                            'components/first-contact',
                            args: [
                                'title' => $args['secondary_cta'],
                                'size'  => 'big',
                            ]
                        );
                    }
                    ?>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>