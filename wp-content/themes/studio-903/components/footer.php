<div class="footer">
    <div class="footer__main">
        <div class="container">
            <div class="footer__row">
                <div class="footer__me">
                    <a
                        class="footer__logo"
                        href="<?php s903()->attr( home_url() ); ?>"
                    >
                        <?php get_template_part( 'images/logo.svg' ); ?>
                    </a>
                    <div>
                        <?php get_template_part( 'collections/socials' ); ?>
                    </div>
                </div>

                <div class="footer__separator"></div>

                <div class="footer__nav">
                    <div class="footer__contacts">
                        <?php get_template_part( 'collections/contacts' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
