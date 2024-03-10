<form
    method="post"
    action="javascript:void(0);"
    data-basepath="<?php s903()->attr( get_rest_url( path: '/s903' ) ); ?>"
    class="form"
>
    <div class="form__hour-error" hidden>
        <?php s903()->form->message( 'hour-error' ); ?>
    </div>

    <fieldset class="form__fieldset">
        <input
            type="hidden"
            name="source"
            value="<?php s903()->attr( $args['source'] ); ?>"
        />

        <div class="form__row">
            <div class="form__field">
                <label
                    for="<?php s903()->attr( "{$args['id']}-form-date" ); ?>"
                >
                    <?php s903()->form->label( 'date' ); ?>
                </label>
                <select
                    name="date"
                    id="<?php s903()->attr( "{$args['id']}-form-date" ); ?>"
                    class="form__date"
                    required
                >
                    <option selected value="">
                        <?php s903()->form->label( 'date_select' ); ?>
                    </option>
                    <?php
                    foreach ( s903()->form->getDates() as $s903_form_date ) :
                        ?>
                        <option value="<?php s903()->attr( $s903_form_date['value'] ); ?>">
                            <?php
                                pll_current_language() === 'en'
                                    ? s903()->attr( "{$s903_form_date['month']}/{$s903_form_date['day']}" )
                                    : s903()->attr( "{$s903_form_date['day']}/{$s903_form_date['month']}" );
                            ?>
                        </option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="form__field">
                <label
                    class="form__hour-label"
                    for="<?php s903()->attr( "{$args['id']}-form-hour" ); ?>"
                >
                    <?php s903()->form->label( 'hour' ); ?>

                    <span class="form__hour-label-loading" hidden>
                        <?php get_template_part( 'images/spinner.svg' ); ?>
                    </span>
                </label>
                <select
                    name="hour"
                    id="<?php s903()->attr( "{$args['id']}-form-hour" ); ?>"
                    class="form__hour"
                    required
                    disabled
                ></select>
            </div>
        </div>

        <div class="form__field">
            <label
                for="<?php s903()->attr( "{$args['id']}-form-name" ); ?>"
            >
                <?php s903()->form->label( 'name' ); ?>
            </label>
            <input
                type="text"
                name="name"
                id="<?php s903()->attr( "{$args['id']}-form-name" ); ?>"
                class="form__name"
                required
            />
        </div>

        <div class="form__row">
            <div class="form__field">
                <label
                    for="<?php s903()->attr( "{$args['id']}-form-contact-key" ); ?>"
                >
                    <?php s903()->form->label( 'contact_key' ); ?>
                </label>
                <select
                    name="contact-key"
                    id="<?php s903()->attr( "{$args['id']}-form-contact-key" ); ?>"
                    class="form__contact-key"
                    required
                >
                    <option selected value="whatsapp"><?php s903()->form->label( 'contact_whatsapp_option' ); ?></option>
                    <option value="phone"><?php s903()->form->label( 'contact_phone_option' ); ?></option>
                    <option value="email"><?php s903()->form->label( 'contact_email_option' ); ?></option>
                </select>
            </div>

            <div class="form__field">
                <label
                    for="<?php s903()->attr( "{$args['id']}-form-contact-value" ); ?>"
                    class="form__contact-value-label"
                    data-phone-label="<?php s903()->form->label( 'contact_phone_value' ); ?>"
                    data-email-label="<?php s903()->form->label( 'contact_email_value' ); ?>"
                >
                    <?php s903()->form->label( 'contact_phone_value' ); ?>
                </label>
                <input
                    type="tel"
                    name="contact-value"
                    id="<?php s903()->attr( "{$args['id']}-form-contact-value" ); ?>"
                    class="form__contact-value"
                    required
                />
            </div>
        </div>

        <div class="form__field">
            <input
                type="checkbox"
                id="<?php s903()->attr( "{$args['id']}-form-details-checkbox" ); ?>"
                class="form__details-checkbox visually-hidden"
            />
            <label
                for="<?php s903()->attr( "{$args['id']}-form-details-checkbox" ); ?>"
                class="form__details-checkbox-label"
            >
                <?php s903()->form->label( 'add_details' ); ?>
            </label>

            <label
                for="<?php s903()->attr( "{$args['id']}-form-details" ); ?>"
                class="form__details-label"
                hidden
            >
                <?php s903()->form->label( 'details' ); ?>

                <small>
                    <?php s903()->form->label( 'not_required' ); ?>
                </small>
            </label>
            <textarea
                name="details"
                id="<?php s903()->attr( "{$args['id']}-form-details" ); ?>"
                class="form__details"
                hidden
            ></textarea>
        </div>
    </fieldset>

    <div class="form__submit">
        <button type="submit" class="button form__button">
            <?php s903()->form->label( 'submit' ); ?>
        </button>

        <span class="form__submit-loading" hidden>
            <?php get_template_part( 'images/spinner.svg' ); ?>
        </span>
    </div>

    <div class="form__error" hidden>
        <?php s903()->form->message( 'error' ); ?>
    </div>

    <div class="form__success" hidden>
        <?php s903()->form->message( 'success' ); ?>
    </div>
    
    <div class="form__disclaimer">
        <?php
        if ( pll_current_language() === 'pt' ) {
            ?>
            <p>Este site é protegido pelo reCAPTCHA e a <a href="https://policies.google.com/privacy">Política de Privacidade</a> e os <a href="https://policies.google.com/terms">Termos de Serviço</a> do Google se aplicam.</p>
        <?php
        } else {
            ?>
            <p>This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>
        <?php
        }
        ?>
    </div>
</form>

<label
    class="form__close-label"
    for="<?php s903()->attr( $args['close_target'] ); ?>"
    aria-label="Close form"
>
    <?php get_template_part( 'images/close.svg' ); ?>
</label>
