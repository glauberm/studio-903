<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Query;

class StudioImagePostType extends AbstractPostType
{
    protected string $label = 'Studios images';

    protected string $pageTitle = 'Studios images';

    protected string $menuTitle = 'Images';

    public function collection(string $studioId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'studio_image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'studio_image_studio',
            'meta_value'     => $studioId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }

    protected function getCustomColumns(): ?array
    {
        add_action(
            'admin_head',
            function () {
                $thumbnail_size = get_option('thumbnail_size_w', 150) . 'px';

                echo <<<HTML
                <style>
                    .column-studio_image_image,
                    .column-studio_image_studio {
                        width: {$thumbnail_size};
                    }
                </style>
                HTML;
            }
        );

        return [
            'studio_image_image'  => __('Image'),
            'title'  => __('Title'),
            'studio_image_studio' => __('Studio'),
        ];
    }

    public function setCustomColumn(string $column): void
    {
        global $post;

        switch ($column) {
            case 'studio_image_image':
                $image = get_field('studio_image_url', $post->ID);
                $post_link = get_edit_post_link($post);

                echo <<<HTML
					<a href="{$post_link}">
						<img src="{$image['sizes']['thumbnail']}" alt="" />
					</a>
				HTML;
                break;
            case 'studio_image_studio':
                $studio = get_post(get_field('studio_image_studio'));

                echo <<<HTML
                    <span>{$studio->post_title}</span>
                HTML;
                break;
        }
    }
}
