<?php

$s903_about_collection = s903()->abouts->collection();

if ( $s903_about_collection->have_posts() ) {
	?>
	<div class="about">
		<?php
		while ( $s903_about_collection->have_posts() ) {
			$s903_about_collection->the_post();
			?>
				<div class="about__item">
                    <div class="about__flex">
                        <div class="about__img">
                            <img src="" alt="" />
                        </div>
                        <div>
                            <h3 class="about__title"><?php the_title(); ?></h3>
                            <div class="about__text"><?php the_field( 'about_text' ); ?></div>
                        </div>
                    </div>
				</div>
			<?php
		}
		?>
	</div>
	<?php
}

wp_reset_postdata();
