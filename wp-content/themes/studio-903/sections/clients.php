<?php

$s903_front_page_clients_query = new WP_Query( array( 'pagename' => $args['pagename'] ) );

if ( pll_current_language() === $args['lang'] && $s903_front_page_clients_query->have_posts() ) {
    $s903_front_page_clients_query->the_post();
    ?>
        <section class="section clients-section">
            <div class="container">
                <h2 class="section__title clients-section__title"><?php the_title(); ?></h2>
            </div>
            <div class="clients-section__grid">
                <?php get_template_part( 'collections/clients' ); ?>
            </div>
        </section>
    <?php
}
wp_reset_postdata();
