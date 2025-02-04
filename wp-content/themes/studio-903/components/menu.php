<div class="menu">
    <input
        type="checkbox"
        name="menu-trigger"
        id="menu-trigger"
        class="menu__trigger-input visually-hidden" />

    <label
        for="menu-trigger"
        class="menu__trigger-label"
        aria-label="Menu">
        <span class="visually-hidden">Menu</span>
        <div>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </label>

    <div class="menu__bg"></div>

    <div class="menu__content">
        <nav class="menu__nav">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>
    </div>
</div>