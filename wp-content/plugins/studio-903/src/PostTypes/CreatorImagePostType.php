<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;
use WP_Post;
use WP_Query;

class CreatorImagePostType extends AbstractPostType
{
    protected string $label = 'Artists + Creators images';

    protected string $pageTitle = 'Artists + Creators images';

    protected string $menuTitle = 'Images';

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'thumbnail',
        'revisions',
        'page-attributes',
    ];

    public function collection(string $creatorId): WP_Query
    {
        return new WP_Query([
            'post_type'      => 'creator-image',
            'posts_per_page' => 20,
            'nopagination'   => true,
            'order'          => 'asc',
            'orderby'        => 'menu_order',
            'meta_key'       => 'creator_image_creator',
            'meta_value'     => $creatorId,
            'meta_type'      => 'UNSIGNED',
        ]);
    }

    public function getCreator(WP_Post $creatorImage): WP_Post
    {
        $creatorId = get_fields($creatorImage)['creator_image_creator'];

        return get_post($creatorId);
    }

    protected function getCustomColumns(): ?array
    {
        return [
            'thumbnail'  => __('Image'),
            'relationship' => 'Creator',
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
                $creator = get_post(get_field('creator_image_creator'));

                echo <<<HTML
                    <span>{$creator->post_title}</span>
                HTML;
                break;
        }
    }
}
