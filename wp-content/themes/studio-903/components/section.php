<?php

if ($args['query']->have_posts()) :
    global $post;

    $args['query']->the_post();
    $s903_section_id = $post->post_name;
?>
    <section
        id="<?php s903()->attr($s903_section_id); ?>"
        class="<?php s903()->attr("section section--{$args['theme']} {$args['name']}"); ?>">
        <div
            class="<?php s903()->attr("container {$args['name']}__container"); ?>">
            <h2 class="
                <?php s903()->attr("section__title {$args['name']}__title"); ?>
                <?php
                array_key_exists('is_title_invisible', $args)
                    && $args['is_title_invisible']
                    ? s903()->attr('visually-hidden')
                    : null;
                ?>
            ">
                <?php the_title(); ?>
            </h2>
            <?php

            if (get_the_content()) :
            ?>
                <div
                    class="<?php s903()->attr("section__text {$args['name']}__text"); ?>">
                    <?php the_content(); ?>
                </div>
            <?php
            endif;
            ?>
            <div class="<?php s903()->attr("section__wrapper {$args['name']}__wrapper"); ?>">
                <?php
                get_template_part(
                    $args['slot_template'],
                    args: array('section_id' => $s903_section_id),
                );
                ?>
            </div>
        </div>
    </section>
<?php
endif;

wp_reset_postdata();
