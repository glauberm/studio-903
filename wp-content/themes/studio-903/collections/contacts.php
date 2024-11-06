<?php

$s903_contacts_collection = s903()->contacts->collection();

if ($s903_contacts_collection->have_posts()) :
?>
    <div class="contacts">
        <ul class="contacts__list">
            <?php

            while ($s903_contacts_collection->have_posts()) :

                $s903_contacts_collection->the_post();
            ?>
                <li class="contacts__item">
                    <address>
                        <a
                            href="<?php the_permalink(); ?>"
                            target="_blank"
                            rel="me noreferrer noopener"
                            class="contacts__link">
                            <div class="contacts__icon">
                                <?php s903_get_contact_image(get_field('contact_type')); ?>
                            </div>
                            <div class="contacts__text">
                                <?php the_title(); ?>
                            </div>
                        </a>
                        <address>
                </li>
            <?php
            endwhile;
            ?>
        </ul>
    </div>
<?php
endif;

wp_reset_postdata();
