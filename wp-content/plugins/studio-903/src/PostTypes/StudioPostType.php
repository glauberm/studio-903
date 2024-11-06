<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\PostType;
use WP_Query;

class StudioPostType extends PostType
{
    protected string $slug = 'studio';

    protected string $label = 'Studios';

    protected string $pageTitle = 'Studios';

    protected string $menuTitle = 'Studios';

    protected string $icon = 'dashicons-store';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'editor',
        'revisions',
        'page-attributes',
    ];

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'estudio']);
            default:
                return new WP_Query(['pagename' => 'studio']);
        }
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'studio',
            'posts_per_page' => 10,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }

    protected function getCustomColumns(): ?array
    {
        return null;
    }

    public function setCustomColumn(string $column): void
    {
        return;
    }
}
