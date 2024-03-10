<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class AboutPostType extends AbstractPostType
{
    protected string $label = 'About';

    protected string $pageTitle = 'About';

    protected string $menuTitle = 'About';

    protected string $icon = 'dashicons-id-alt';

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'sobre']);
            default:
                return new WP_Query(['pagename' => 'about']);
        }
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'about',
            'posts_per_page' => 5,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }
}
