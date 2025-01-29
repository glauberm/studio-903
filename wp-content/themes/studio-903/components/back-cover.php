<?php

if ($args['query']->have_posts()) :

    $args['query']->the_post();
?>
    <div class="back-cover">
        <div class="container">
            <div class="back-cover__container">
                <h2 class="back-cover__title">
                    <?php s903()->html(get_the_title()); ?>
                </h2>

                <p class="back-cover__content">
                    <?php s903()->html(get_the_content()); ?>
                </p>

                <?php
                if (get_field('back_cover_primary_cta_label') || get_field('back_cover_secondary_cta_label')) :
                ?>
                    <div class="back-cover__ctas">

                        <?php
                        if (get_field('back_cover_primary_cta_label')) :
                        ?>
                            <input
                                name="back-cover-cta"
                                id="back-cover-cta"
                                type="checkbox"
                                class="back-cover__checkbox visually-hidden" />

                            <label
                                for="back-cover-cta"
                                class="button button--big button--filled back-cover__primary-cta">
                                <?php the_field('back_cover_primary_cta_label'); ?>
                            </label>

                            <div class="popover back-cover__popover">
                                <div class="back-cover__box">
                                    <?php
                                    get_template_part(
                                        'components/form',
                                        args: array(
                                            'id'           => 'back-cover',
                                            'close_target' => 'back-cover-cta',
                                            'source'       => wp_strip_all_tags(get_the_title()),
                                        )
                                    );
                                    ?>
                                </div>
                            </div>

                        <?php
                        endif;
                        ?>

                        <?php
                        if (get_field('back_cover_secondary_cta_label')) {
                            get_template_part(
                                'components/first-contact',
                                args: array(
                                    'title' => get_field('back_cover_secondary_cta_label'),
                                    'size'  => 'big',
                                )
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
<?php
endif;

wp_reset_postdata();
