<?php

$s903_socials_collection = s903()->socials->collection();

if ($s903_socials_collection->have_posts()) :
?>
    <div class="socials">
        <ul class="socials__list">
            <?php
            while ($s903_socials_collection->have_posts()) :

                $s903_socials_collection->the_post();
            ?>
                <li class="socials__item">
                    <a
                        href="<?php the_permalink(); ?>"
                        target="_blank"
                        rel="me noreferrer noopener"
                        class="socials__link">
                        <?php s903_get_social_image(get_field('social_type')); ?>

                        <span class="socials__text">
                            <?php the_title(); ?>
                        </span>
                    </a>
                </li>
            <?php
            endwhile;
            ?>
        </ul>
    </div>
<?php
endif;

wp_reset_postdata();
