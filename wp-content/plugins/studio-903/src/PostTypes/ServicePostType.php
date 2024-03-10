<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class ServicePostType extends AbstractPostType
{
    protected string $label = 'Services';

    protected string $pageTitle = 'Services';

    protected string $menuTitle = 'Services';

    protected string $icon = 'dashicons-index-card';

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'servicos']);
            default:
                return new WP_Query(['pagename' => 'services']);
        }
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => 10,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }
}
