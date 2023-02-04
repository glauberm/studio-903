<?php

$s903_socials_collection = s903()->socials->collection();

if ( $s903_socials_collection->have_posts() ) {
	?>
	<div class="socials">
		<ul class="socials__list">
		<?php
		while ( $s903_socials_collection->have_posts() ) {
			$s903_socials_collection->the_post();
			?>
				<li class="socials__item">
					<a
						href="<?php the_field( 'social_url' ); ?>"
						target="_blank"
						rel="noreferrer noopener"
						title="<?php the_title(); ?>"
						class="socials__link"
					>
						<?php
						switch ( get_field( 'social_type' ) ) {
							case 'instagram':
								get_template_part( 'images/instagram.svg' );
								break;
							case 'facebook':
								get_template_part( 'images/facebook.svg' );
								break;
							case 'linkedin':
								get_template_part( 'images/linkedin.svg' );
								break;
						}
						?>
                        <span class="socials__text">
                            <?php the_title(); ?>
                        </span>
					</a>
				</li>
			<?php
		}
		?>
		</ul>
	</div>
	<?php
}

wp_reset_postdata();
