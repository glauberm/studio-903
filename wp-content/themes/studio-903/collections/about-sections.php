<?php

$s903_about_sections_query = new WP_Query(
	array(
		'post_type'      => 'about-sections',
		'posts_per_page' => 10,
		'nopagination'   => true,
		'order'          => 'asc',
		'orderby'        => 'menu_order',
	)
);

if ( $s903_about_sections_query->have_posts() ) {
	?>
	<div class="about-sections">
		<?php
		while ( $s903_about_sections_query->have_posts() ) {
			$s903_about_sections_query->the_post();
			?>
				<div class="about-sections__item">
					<h3 class="about-sections__title"><?php the_title(); ?></h3>
					<div class="about-sections__text"><?php the_field( 'about_section_text' ); ?></div>
				</div>
			<?php
		}
		?>
	</div>
	<?php
}

wp_reset_postdata();
