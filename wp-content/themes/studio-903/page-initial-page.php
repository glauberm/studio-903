<?php
get_header(
	args: array(
		'preload' => array(
			array(
				'href' => get_field( 'cover_video' ),
				'type' => 'video/mp4',
				'as'   => 'video',
			),
			array(
				'href' => get_field( 'cover_poster' ),
				'type' => 'image/jpeg',
				'as'   => 'image',
			),
		),
	)
);
?>

<main class="main">
	<section>
		<?php
		get_template_part(
			'components/cover',
			args: array(
				'video'    => get_field( 'cover_video' ),
				'poster'   => get_field( 'cover_poster' ),
				'title'    => get_field( 'cover_title' ),
				'subtitle' => get_field( 'cover_subtitle' ),
			)
		);
		?>
	</section>

	<section class="section about-section">
		<div class="container">
			<h2 class="visually-hidden"><?php the_field( 'about_title' ); ?></h2>
			<div class="about-section__lead">
				<?php the_field( 'about_text' ); ?>
			</div>
			<aside>
				<?php get_template_part( 'collections/about-sections' ); ?>
			</aside>
		</div>
	</section>

	<section class="section clients-section">
		<div class="container">
			<div class="clients-section__content">
				<h2 class="clients-section__title"><?php the_field( 'clients_title' ); ?></h2>
				<div class="clients-section__text">
					<?php the_field( 'clients_text' ); ?>
				</div>
			</div>
			<div class="clients-section__grid">
				<?php get_template_part( 'collections/clients' ); ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
