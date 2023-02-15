<?php

$s903_abouts_collection = s903()->abouts->collection();

if ( $s903_abouts_collection->have_posts() ) :
    ?>
    <ul class="abouts">
        <?php
        while ( $s903_abouts_collection->have_posts() ) :
            $s903_abouts_collection->the_post();

            global $post;
            $s903_about_id = $post->ID;
            ?>
            <li
                id="<?php s903()->attr( "{$args['section_id']}-{$s903_about_id}" ); ?>"
                class="abouts__item"
            >
                <div class="abouts__flex">
                    <div class="abouts__img">
                        <?php
                        the_post_thumbnail(
                            'about-thumbnail',
                            array(
                                'srcset'  => get_the_post_thumbnail_url( size: 'about-thumbnail' ) . ' 300w, ' .
                                            get_the_post_thumbnail_url( size: 'about-thumbnail-lg' ) . ' 720w',
                                'sizes'   => '(max-width: 767px) 720px, 300px',
                                'loading' => 'lazy',
                            )
                        );
                        ?>
                    </div>
                    <div class="abouts__content">
                        <h3 class="abouts__title"><?php the_title(); ?></h3>
                        <div class="abouts__text"><?php the_content(); ?></div>
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
