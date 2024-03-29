<div class="header">
    <a
        class="header__logo"
        href="<?php s903()->attr( home_url() ); ?>"
    >
        <?php get_template_part( 'images/logo.svg' ); ?>
    </a>

    <div class="header__menu">
        <?php get_template_part( 'components/menu' ); ?>
    </div>

    <div class="header__cta">
        <?php
        get_template_part(
            'components/first-contact',
            args: array(
                'size'     => 'small',
                'has_icon' => true,
            )
        );
        ?>
    </div>

    <div class="header__lang-switcher">
        <?php get_template_part( 'components/language-switcher' ); ?>
    </div>

</div>
