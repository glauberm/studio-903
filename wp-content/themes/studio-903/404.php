<?php

get_header();

$s903_cover = s903()->section( 'capa', 'cover' );

if ( $s903_cover->have_posts() ) :

    $s903_cover->the_post();
    ?>

    <div class="jumbotron">
        <div class="cover__bg">
            <video
                tabindex="-1"
                autoplay
                loop
                muted
                src="<?php the_field( 'cover_video' ); ?>"
                class="cover__video"
                poster="<?php the_field( 'cover_poster' ); ?>"
            ></video>
        </div>

        <h1><?php echo pll_current_language() === 'pt' ? 'Não encontrada' : 'Not found'; ?></h1>
    </div>
    <?php
endif;

get_footer();
