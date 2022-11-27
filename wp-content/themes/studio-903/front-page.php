<?php
get_header(
	args: array(
		'preload' => array(
			array(
				'href' => get_field( 'video' ),
				'type' => 'video/mp4',
				'as'   => 'video',
			),
			array(
				'href' => get_field( 'poster' ),
				'type' => 'image/jpeg',
				'as'   => 'image',
			),
		),
	)
);
?>

<main>
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

	<section class="section section--dark section-about">
		<div class="section__container">
			<h2 class="visually-hidden"><?php the_field( 'about_title' ); ?></h2>
			<div class="section__lead">
				<?php the_field( 'about_text' ); ?>
			</div>
			<aside>
				<?php get_template_part( 'collections/about-sections' ); ?>
			</aside>
		</div>
	</section>

	<section class="section section--light section-clients">
		<div class="section__container">
			<div class="section-clients__text">
				<h2 class="section__title"><?php the_field( 'clients_title' ); ?></h2>
				<div class="section__text">
					<?php the_field( 'clients_text' ); ?>
				</div>
			</div>
			<div class="section-clients__grid">
				<?php get_template_part( 'collections/clients' ); ?>
			</div>
		</div>
	</section>

	<section class="section section--dark section-contact">
		<div class="section__container">
			<h2 class="section__title"><?php the_field( 'contact_title' ); ?></h2>
			<address class="section-contact__text"><?php the_field( 'contact_address' ); ?></address>
			<div class="section-contact__row">
				<div class="section-contact__form">
					<?php get_template_part( 'forms/contact' ); ?>
				</div>
				<div class="section-contact__list">
					<?php get_template_part( 'collections/contacts' ); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
