<?php

if ( $args['query']->have_posts() ) {
    $args['query']->the_post();

    ?>
    <section class="<?php s903()->attr( "section {$args['name']}" ); ?>">
        <div class="<?php s903()->attr( "container {$args['name']}__container" ); ?>">
            <h2 class="<?php s903()->attr( "section__title {$args['name']}__title" ); ?>
                <?php
                    array_key_exists( 'is_title_invisible', $args )
                    && $args['is_title_invisible']
                        ? s903()->attr( 'visually-hidden' )
                        : '';
                ?>
            ">
                <?php the_title(); ?>
            </h2>
            <?php

            if ( array_key_exists( 'text', $args ) ) {
                ?>
                <div class="<?php s903()->attr( "section__text {$args['name']}__text" ); ?>">
                    <?php the_field( $args['text_field'] ); ?>
                </div>
                <?php
            }
            ?>
            <div class="
                <?php
                    array_key_exists( 'container_classname', $args )
                    && $args['container_classname']
                        ? s903()->attr( "{$args['name']}__{$args['container_classname']}" )
                        : '';
                ?>
            ">
            <?php
                get_template_part(
                    $args['slot_template'],
                    args:
                        array_key_exists( 'slot_args', $args )
                        && $args['slot_args']
                            ? $args['slot_args'] : array(),
                );
            ?>
            </div>
        </div>
    </section>
    <?php
}

wp_reset_postdata();
