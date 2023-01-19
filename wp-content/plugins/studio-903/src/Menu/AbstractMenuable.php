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

    public function __construct(protected readonly string $slug, protected readonly ?string $parent = null)
    {
        if ($parent) {
            add_action('admin_menu', [$this, 'addSubmenu']);
        } else {
            add_action('admin_menu', [$this, 'addMenu']);
        }
    }

    public function addMenu()
    {
        MenuManager::addMenu($this->pageTitle, $this->menuTitle, $this->capability, $this->slug, $this->icon);
    }

    public function addSubmenu()
    {
        MenuManager::addSubmenu(
            $this->parent,
            $this->pageTitle,
            $this->menuTitle,
            $this->capability,
            "edit.php?post_type={$this->slug}",
        );
    }
}
