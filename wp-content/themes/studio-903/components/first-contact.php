<?php

$s903_contact_first = s903()->contacts->first();

if ($s903_contact_first->have_posts()) :

    $s903_contact_first->the_post();
?>
    <div class="first-contact">
        <a
            href="<?php the_permalink(); ?>"
            class="
            <?php

            $s903_classname = "button button--{$args['size']}";

            if (array_key_exists('has_icon', $args) && $args['has_icon']) :
                $s903_classname .= ' button--with-icon';
            else :
                $s903_classname .= ' button--outline';
            endif;

            s903()->attr($s903_classname);
            ?>"
            target="_blank"
            rel="noreferrer noopener"
            aria-label="Contact us">
            <?php

            if (array_key_exists('has_icon', $args) && $args['has_icon']) :
            ?>
                <span class="first-contact__icon">
                    <?php s903_get_contact_image(get_field('contact_type')); ?>
                </span>
            <?php

            endif;
            ?>

            <span class="first-contact__label">
                <?php

                array_key_exists('title', $args) && $args['title']
                    ? s903()->html($args['title'])
                    : the_title();
                ?>
            </span>
        </a>
    </div>
<?php
endif;

wp_reset_postdata();
