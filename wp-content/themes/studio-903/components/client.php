<?php

$args['query']->the_post();

$s903_client_image = get_field( 'client_image' );

?>

<li
	class="clients__item"
	<?php echo array_key_exists( 'ariaHidden', $args ) && $args['aria_hidden'] ? 'aria-hidden="true"' : ''; ?>
>
	<a
		href="<?php the_field( 'client_url' ); ?>"
		target="_blank"
		rel="noreferrer noopener"
		title="<?php the_title(); ?>"
		class="clients__link"
        tabindex="-1"
	>
		<img
			class="clients__image"
			src="<?php echo $s903_client_image['sizes']['client-thumbnail']; ?>"
			alt="<?php the_title(); ?>"
			loading="lazy"
		/>
	</a>
</li>
