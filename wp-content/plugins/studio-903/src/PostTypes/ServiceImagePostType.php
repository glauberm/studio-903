<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class ServiceImagePostType extends AbstractPostType
{
    protected string $label = 'Services images';

    protected string $pageTitle = 'Services images';

    protected string $menuTitle = 'Images';

    public function collection(string $serviceId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'service_image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'service_image_service',
            'meta_value'     => $serviceId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }
}
