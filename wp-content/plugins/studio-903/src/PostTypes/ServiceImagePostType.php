<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Post;
use WP_Query;

class ServiceImagePostType extends AbstractPostType
{
    protected string $label = 'Services images';

    protected string $pageTitle = 'Services images';

    protected string $menuTitle = 'Images';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'thumbnail',
        'revisions',
        'page-attributes',
    ];

    public function collection(string $serviceId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'service-image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'service_image_service',
            'meta_value'     => $serviceId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }

    public function getService(WP_Post $serviceImage): WP_Post
    {
        $serviceId = get_fields($serviceImage)['service_image_service'];

        return get_post($serviceId);
    }

    protected function getCustomColumns(): ?array
    {
        return [
            'thumbnail'  => __('Image'),
            'relationship' => 'Service',
        ];
    }

    public function setCustomColumn(string $column): void
    {
        global $post;

        switch ($column) {
            case 'thumbnail':
                $image = get_the_post_thumbnail_url($post->ID, 'thumbnail');
                $post_link = get_edit_post_link($post);

                echo <<<HTML
					<a href="{$post_link}">
						<img src="{$image}" alt="" />
					</a>
				HTML;
                break;
            case 'relationship':
                $service = get_post(get_field('service_image_service'));

                echo <<<HTML
                    <span>{$service->post_title}</span>
                HTML;
                break;
        }
    }
}
