<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class SocialPostType extends AbstractPostType
{
    protected string $label = 'Social media profiles';

    protected string $pageTitle = 'Social media profiles';

    protected string $menuTitle = 'Social media profiles';

    protected string $icon = 'dashicons-share';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'revisions',
        'page-attributes',
    ];

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'social',
            'posts_per_page' => 5,
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
