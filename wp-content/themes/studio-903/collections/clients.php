<?php

$s903_clients_collection = s903()->clients->collection();

if ($s903_clients_collection->have_posts()) :
    function s903_clients_collection_item(bool $sr_only = false): void
    {
?>
        <li class="clients__item">
            <a
                href="<?php the_permalink(); ?>"
                target="_blank"
                rel="noreferrer noopener"
                title="<?php s903()->attr(get_the_title()); ?>"
                class="clients__link"
                <?php !$sr_only ? s903()->attr('tabindex=-1') : ''; ?>>
                <?php
                the_post_thumbnail(
                    'client-thumbnail',
                    array(
                        'srcset'  => get_the_post_thumbnail_url(size: 'client-thumbnail') . ' 200w, ' .
                            get_the_post_thumbnail_url(size: 'client-thumbnail-lg') . ' 400w',
                        'sizes'   => '(max-width: 767px) 200px, 300px',
                        'loading' => 'lazy',
                        'class'   => 'clients__image',
                        'alt'     => esc_attr(get_the_title()),
                    )
                );
                ?>
            </a>
        </li>
    <?php
    }
    ?>

    <div class="clients">
        <ul class="visually-hidden">
            <?php

            while ($s903_clients_collection->have_posts()) {
                $s903_clients_collection->the_post();
                s903_clients_collection_item(true);
            }
            ?>
        </ul>

        <?php
        for ($s903_i = 0; $s903_i < 3; $s903_i++) :
        ?>
            <div class="clients__group">
                <ul
                    class="<?php s903()->attr("clients__list clients__list--{$s903_i}"); ?>"
                    aria-hidden="true">
                    <?php

                    while ($s903_clients_collection->have_posts()) {
                        $s903_clients_collection->the_post();
                        s903_clients_collection_item();
                    }

                    while ($s903_clients_collection->have_posts()) {
                        $s903_clients_collection->the_post();
                        s903_clients_collection_item();
                    }
                    ?>
                </ul>
            </div>
        <?php
        endfor;
        ?>
    </div>
<?php
endif;

wp_reset_postdata();
