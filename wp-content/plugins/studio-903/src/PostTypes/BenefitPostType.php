<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class BenefitPostType extends AbstractPostType
{
    protected string $label = 'Benefits';

    protected string $pageTitle = 'Benefits';

    protected string $menuTitle = 'Benefits';

    protected string $icon = 'dashicons-lightbulb';

    public function section(): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => 'beneficios']);
            default:
                return new WP_Query(['pagename' => 'benefits']);
        }
    }

    public function collection(): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'benefit',
            'posts_per_page' => 5,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
        ]);
    }
}
