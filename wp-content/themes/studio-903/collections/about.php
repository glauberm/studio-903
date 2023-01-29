<?php

$s903_about_query = new WP_Query(
	array(
		'post_type'      => 'about',
		'posts_per_page' => 5,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_about_query->have_posts() ) {
	?>
	<div class="about">
		<?php
		while ( $s903_about_query->have_posts() ) {
			$s903_about_query->the_post();
			?>
				<div class="about__item">
					<h3 class="about__title"><?php the_title(); ?></h3>
					<div class="about__text"><?php the_field( 'about_text' ); ?></div>
				</div>
			<?php
		}
		?>
	</div>
	<?php
}

wp_reset_postdata();
