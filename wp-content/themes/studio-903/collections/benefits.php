<?php

$s903_benefits_collection = s903()->benefits->collection();

if ($s903_benefits_collection->have_posts()) :
?>
    <ul class="benefits">
        <?php
        while ($s903_benefits_collection->have_posts()) :
            $s903_benefits_collection->the_post();

            global $post;
            $s903_benefit_id = $post->ID;
        ?>
            <li
                id="<?php s903()->attr("{$args['section_id']}-{$s903_benefit_id}"); ?>"
                class="benefits__item">
                <div class="benefits__flex">
                    <div class="benefits__img">
                        <?php
                        the_post_thumbnail(
                            'about-thumbnail',
                            array(
                                'srcset'  => get_the_post_thumbnail_url(size: 'benefit-thumbnail') . ' 300w, ' .
                                    get_the_post_thumbnail_url(size: 'benefit-thumbnail-lg') . ' 720w',
                                'sizes'   => '(max-width: 767px) 720px, 300px',
                                'loading' => 'lazy',
                            )
                        );
                        ?>
                    </div>
                    <div class="benefits__content">
                        <h3 class="benefits__title"><?php the_title(); ?></h3>
                        <div class="benefits__text"><?php the_content(); ?></div>
                    </div>
                </div>
            </li>
        <?php
        endwhile;
        ?>
    </ul>
<?php
endif;

wp_reset_postdata();
