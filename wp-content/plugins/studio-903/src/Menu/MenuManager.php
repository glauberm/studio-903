<?php

declare(strict_types=1);

namespace Studio903\Menu;

class MenuManager
{
    private static int $initialPosition = 25;

    public static function addMenu(
        string $pageTitle,
        string $menuTitle,
        string $capability,
        string $menuSlug,
        string $icon
    ): void {
        add_action(
            'admin_menu',
            add_menu_page(
                page_title: $pageTitle,
                menu_title: $menuTitle,
                capability: $capability,
                menu_slug: $menuSlug,
                icon_url: $icon,
                position: self::$initialPosition
            )
        );

        self::$initialPosition++;
    }
}
