<?php

$s903_front_page_studio_query = new WP_Query( array( 'pagename' => $args['pagename'] ) );

if ( pll_current_language() === $args['lang'] && $s903_front_page_studio_query->have_posts() ) {
    $s903_front_page_studio_query->the_post();
    ?>
        <section class="section creators-section">
            <div class="container">
                <h2 class="section__title">Creators</h2>
                <?php get_template_part( 'collections/creators' ); ?>
            </div>
        </section>
    <?php
}
wp_reset_postdata();
