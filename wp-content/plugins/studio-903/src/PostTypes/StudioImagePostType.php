<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class StudioImagePostType extends AbstractPostType
{
    protected string $pageTitle = 'Studios images';

    protected string $menuTitle = 'Images';

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
