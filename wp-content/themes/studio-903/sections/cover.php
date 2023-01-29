<section class="cover cover-section">
    <div class="cover__bg">
        <video autoplay loop muted src="<?php echo $args['video']; ?>" class="cover__video" poster="<?php echo $args['poster']; ?>"></video>
    </div>

    <div class="cover__content">
        <div>
            <h1 class="visually-hidden">Studio 903</h1>
            <p class="cover__title"><?php echo $args['title']; ?></p>
            <p class="cover__subtitle"><?php echo $args['subtitle']; ?></p>
        </div>
    </div>
</section>
