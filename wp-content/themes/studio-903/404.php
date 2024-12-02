<?php

get_header();

$s903_cover = s903()->section('capa', 'cover');

if ($s903_cover->have_posts()) :
    $s903_cover->the_post();
?>

    <div class="cover active">
        <div class="cover__bg">
            <video
                tabindex="-1"
                autoplay
                loop
                muted
                playsinline
                src="<?php the_field('cover_video'); ?>"
                class="cover__video"
                poster="<?php the_field('cover_poster'); ?>"></video>
        </div>

        <div class="container">
            <div class="cover__container">

                <h1 class="cover__title">
                    <?php echo pll_current_language() === 'pt'
                        ? 'Página não encontrada'
                        : 'Page not found'; ?>
                </h1>

                <p class="cover__content">
                    <?php if (pll_current_language() === 'pt'): ?>
                        A página que você está procurando não existe ou foi movida. Vá para a <a href="<?php echo site_url(); ?>">página inicial</a>.
                    <?php else: ?>
                        The page you are looking for doesn't exist or has been moved. Go to the <a href="<?php echo site_url(); ?>">homepage</a>.
                    <?php endif; ?>
                </p>

            </div>
        </div>
    </div>
<?php

endif;

get_template_part('components/cookie-banner');

get_footer();
