<?php

declare(strict_types=1);

namespace Studio903\Menu;

use Studio903\Menu\MenuManager;

trait Menuable
{
    protected string $pageTitle;

    protected string $menuTitle;

    protected string $capability = 'edit_posts';

    protected string $icon;

    public function addMenu(string $menuSlug): void
    {
        add_action('admin_menu', function () use ($menuSlug) {
            MenuManager::addMenu(
                $this->pageTitle,
                $this->menuTitle,
                $this->capability,
                $menuSlug,
                $this->icon
            );
        });
    }
}
