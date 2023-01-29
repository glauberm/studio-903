<?php

$s903_front_page_about_query = new WP_Query( array( 'pagename' => $args['pagename'] ) );

if ( pll_current_language() === $args['lang'] && $s903_front_page_about_query->have_posts() ) {
    $s903_front_page_about_query->the_post();
    ?>
        <section class="section about-section">
            <div class="container about-section__container">
                <h2 class="visually-hidden"><?php the_title(); ?></h2>
                <div class="about-section__lead">
                    <?php the_field( 'about_section_text' ); ?>
                </div>
                <div class="about-section__items">
                    <?php get_template_part( 'collections/about' ); ?>
                </div>
            </div>
        </section>
    <?php
}
wp_reset_postdata();
