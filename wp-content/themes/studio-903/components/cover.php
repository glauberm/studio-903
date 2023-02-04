<section class="cover cover-section">
    <div class="cover__bg">
        <video
            autoplay
            loop
            muted
            src="<?php s903()->attr( $args['video'] ); ?>"
            class="cover__video"
            poster="<?php s903()->attr( $args['poster'] ); ?>"
        ></video>
    </div>

    <div class="cover__content">
        <div>
            <h1 class="visually-hidden">Studio 903</h1>
            <p class="cover__title"><?php s903()->html( $args['title'] ); ?></p>
            <p class="cover__subtitle"><?php s903()->html( $args['subtitle'] ); ?></p>
            <div class="cover__cta">
                <a href="#">Faça um orçamento</a>
                <a href="#">Contact us</a>
            </div>
        </div>
    </div>
</section>
