<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Post;
use WP_Query;

class StudioImagePostType extends AbstractPostType
{
    protected string $label = 'Studios images';

    protected string $pageTitle = 'Studios images';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'thumbnail',
        'revisions',
        'page-attributes',
    ];

    public function collection(string $studioId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'studio-image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'studio_image_studio',
            'meta_value'     => $studioId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }

    public function getStudio(WP_Post $studioImage): WP_Post
    {
        $studioId = get_fields($studioImage)['studio_image_studio'];

        return get_post($studioId);
    }

    protected function getCustomColumns(): ?array
    {
        return [
            'thumbnail'  => __('Image'),
            'relationship' => 'Studio',
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
                $studio = get_post(get_field('studio_image_studio'));

                echo <<<HTML
                    <span>{$studio->post_title}</span>
                HTML;
                break;
        }
    }
}
