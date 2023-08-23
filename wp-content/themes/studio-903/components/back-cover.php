<?php

if ( $args['query']->have_posts() ) :

    $args['query']->the_post();
    ?>
    <div class="back-cover">
        <div class="container">
            <div class="back-cover__container">
                <h2 class="back-cover__title">
                    <?php the_title(); ?>
                </h2>

                <div class="back-cover__content">
                    <?php the_content(); ?>
                </div>

                <?php
                if ( pll_current_language() === 'pt' ) {
                    ?>
                    <div class="back-cover__ctas">
                        <input
                            name="back-cover-cta"
                            id="back-cover-cta"
                            type="checkbox"
                            class="back-cover__checkbox visually-hidden"
                        />

                        <label
                            for="back-cover-cta"
                            class="button button--big button--with-gradient back-cover__primary-cta"
                        >
                            <?php the_field( 'back_cover_primary_cta_label' ); ?>
                        </label>

                        <div class="popover back-cover__popover">
                            <div class="back-cover__box">
                                <?php
                                    get_template_part(
                                        'components/form',
                                        args: array(
                                            'id'           => 'back-cover',
                                            'close_target' => 'back-cover-cta',
                                            'source'       => wp_strip_all_tags( $args['title'] ),
                                        )
                                    );
                                ?>
                            </div>
                        </div>

                        <?php
                            get_template_part(
                                'components/first-contact',
                                args: array(
                                    'title' => get_field( 'back_cover_secondary_cta_label' ),
                                    'size'  => 'big',
                                )
                            );
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
endif;

wp_reset_postdata();
