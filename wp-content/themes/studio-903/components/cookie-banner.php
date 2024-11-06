<div class="cookie-banner cookie-banner--hidden" hidden>
    <div class="cookie-banner__inner">
        <p class="cookie-banner__paragraph">
            <?php if (pll_current_language() === 'pt'): ?>
                <strong>Usamos cookies</strong> para analisar o tráfego e otimizar sua experiência no site. Ao aceitar o nosso uso de cookies, os seus dados serão agregados aos de outros usuários.
            <?php else: ?>
                <strong>We use cookies</strong> to analyze website traffic and optimize your experience. By accepting our use of cookies, your data will be aggregated with the data of other users.
            <?php endif; ?>
        </p>

        <div class="cookie-banner__choices">
            <input
                id="cookie-banner-no"
                type="radio"
                name="_cookie_consent"
                value="0"
                class="cookie-banner__choice-radio visually-hidden" />
            <label
                for="cookie-banner-no"
                class="button button--small button--outline cookie-banner__choice-label">
                <?php echo pll_current_language() === 'pt' ? 'Recusar' : 'Decline' ?>
            </label>

            <input
                id="cookie-banner-yes"
                type="radio"
                name="_cookie_consent"
                value="1"
                class="cookie-banner__choice-radio visually-hidden" />
            <label
                for="cookie-banner-yes"
                class="button button--small button--filled cookie-banner__choice-label">
                <?php echo pll_current_language() === 'pt' ? 'Aceitar' : 'Accept' ?>
            </label>
        </div>
    </div>
</div>