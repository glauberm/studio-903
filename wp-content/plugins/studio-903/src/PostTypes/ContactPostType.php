<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class ContactPostType extends AbstractPostType
{
    protected string $label = 'Contact methods';

    protected string $pageTitle = 'Contact methods';

    protected string $menuTitle = 'Contact methods';

    protected string $icon = 'dashicons-email';

    public function first(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'contact',
            'posts_per_page' => 1,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'contact',
            'posts_per_page' => 5,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }
}
