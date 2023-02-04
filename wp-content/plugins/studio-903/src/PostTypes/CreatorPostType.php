<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class CreatorPostType extends AbstractPostType
{
    protected string $label = 'Artists + Creators';

    protected string $pageTitle = 'Artists + creators';

    protected string $menuTitle = 'Artists + creators';

    protected string $icon = 'dashicons-art';

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'artistas-e-criadores']);
            default:
                return new WP_Query(['pagename' => 'artists-and-creators']);
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
