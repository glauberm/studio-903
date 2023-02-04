<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class CreatorImagePostType extends AbstractPostType
{
    protected string $label = 'Artists + Creators images';

    protected string $pageTitle = 'Artists + Creators images';

    protected string $menuTitle = 'Images';

    public function collection(string $creatorId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'creator_image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'creator_image_creator',
            'meta_value'     => $creatorId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }
}
