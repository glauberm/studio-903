<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\PostType;
use WP_Query;

class ClientPostType extends PostType
{
    protected string $slug = 'client';

    protected string $label = 'Clients';

    protected string $pageTitle = 'Clients';

    protected string $menuTitle = 'Clients';

    protected string $icon = 'dashicons-building';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'thumbnail',
        'revisions',
        'page-attributes',
    ];

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'clientes']);
            default:
                return new WP_Query(['pagename' => 'clients']);
        }
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'client',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }
}
