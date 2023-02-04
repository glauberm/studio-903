<?php

$s903_contact_first = s903()->contacts->first();

if ( $s903_contact_first->have_posts() ) {

    $s903_contact_first->the_post();
	?>
	<div class="contact-cta">
        <a
            href="
            <?php
            switch ( get_field( 'contact_type' ) ) {
                case 'whatsapp':
                    echo 'https://wa.me/' . get_field( 'contact_phone' );
                    break;
                case 'phone':
                case 'mobile':
                    echo 'tel:' . get_field( 'contact_phone' );
                    break;
                case 'email':
                    echo 'mailto:' . get_field( 'contact_email' );
                    break;
                case 'address':
                    the_field( 'contact_address' );
                    break;
            }
            ?>
            "
            target="_blank"
            rel="noreferrer noopener"
            class="contact-cta__link contact-cta__link--<?php the_field( 'contact_type' ); ?>"
        >
            <div class="contact-cta__icon">
                <?php
                switch ( get_field( 'contact_type' ) ) {
                    case 'whatsapp':
                        get_template_part( 'images/whatsapp.svg' );
                        break;
                    case 'phone':
                        get_template_part( 'images/phone.svg' );
                        break;
                    case 'mobile':
                        get_template_part( 'images/smartphone.svg' );
                        break;
                    case 'email':
                        get_template_part( 'images/mail.svg' );
                        break;
                    case 'address':
                        get_template_part( 'images/address.svg' );
                        break;
                }
                ?>
            </div>
            <div class="contact-cta__text">
                <?php the_title(); ?>
            </div>
        </a>
	</div>
	<?php
}

wp_reset_postdata();
