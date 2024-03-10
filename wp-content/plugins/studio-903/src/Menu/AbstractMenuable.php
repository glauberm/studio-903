<?php

declare(strict_types=1);

namespace Studio903\Menu;

use Studio903\Menu\MenuManager;

abstract class AbstractMenuable
{
    protected string $pageTitle;

    protected string $menuTitle;

    protected string $capability = 'edit_posts';

    protected string $icon;

    public function __construct(protected readonly string $slug)
    {
        add_action('admin_menu', [$this, 'addMenu']);
    }

    public function addMenu()
    {
        MenuManager::addMenu($this->pageTitle, $this->menuTitle, $this->capability, $this->slug, $this->icon);
    }
}
