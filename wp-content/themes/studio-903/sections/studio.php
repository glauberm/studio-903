<?php

$s903_front_page_studio_query = new WP_Query( array( 'pagename' => $args['pagename'] ) );

if ( pll_current_language() === $args['lang'] && $s903_front_page_studio_query->have_posts() ) {
    $s903_front_page_studio_query->the_post();
    ?>
        <section class="section studio-section">
            <div class="container">
                <h2 class="section__title studio-section__title">Studio</h2>
                <?php get_template_part( 'collections/studios' ); ?>
            </div>
        </section>
    <?php
}
wp_reset_postdata();
