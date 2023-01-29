<?php

$s903_front_page_studio_query = new WP_Query( array( 'pagename' => $args['pagename'] ) );

if ( pll_current_language() === $args['lang'] && $s903_front_page_studio_query->have_posts() ) {
    $s903_front_page_studio_query->the_post();
    ?>
        <section class="section services-section">
            <div class="container">
                <h2 class="section__title services-section__title">Services</h2>
                <?php get_template_part( 'collections/services' ); ?>
            </div>
        </section>
    <?php
}
wp_reset_postdata();
