<?php

$s903_translations = pll_the_languages( array( 'raw' => 1 ) );
?>
<div class="language-switcher">
	<button class="language-switcher__trigger">
	<?php
	foreach ( $s903_translations as $s903_translation ) {
		if ( true === $s903_translation['current_lang'] ) {
			?>
				<?php echo mb_strtoupper( $s903_translation['slug'] ); ?>
			<?php
			break;
		}
	}
	?>
	</button>

	<ul class="language-switcher__menu sub-menu">
	<?php
	foreach ( $s903_translations as $s903_translation ) {
		?>
		<li>
			<a
				href="<?php echo $s903_translation['url']; ?>"
				lang="<?php echo $s903_translation['locale']; ?>"
			>
				<?php echo $s903_translation['name']; ?>
			</a>
		</li>
		<?php
	}
	?>
	</ul>
</div>
