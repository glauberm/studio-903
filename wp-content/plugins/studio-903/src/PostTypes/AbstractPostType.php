<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\Menu\AbstractMenuable;

abstract class AbstractPostType extends AbstractMenuable
{
    protected string $label;

    /** @var string[] $supports */
    protected array $supports  = [
        'title',
        'thumbnail',
        'editor',
        'revisions',
        'page-attributes',
    ];

    public function __construct(string $slug, ?string $parent = null)
    {
        if (!$parent) {
            parent::__construct($slug);
        }

        add_action(
            'init',
            function () use ($slug, $parent) {
                register_post_type(
                    post_type: $slug,
                    args: [
                        'label' => $this->label,
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => $parent ?? $slug,
                        'supports' => $this->supports,
                    ]
                );
            }
        );

        if ($this->getCustomColumns()) {
            $this->setCustomColumns($slug);
            add_filter("manage_edit-{$slug}_sortable_columns", [$this, 'registerSortableCustomColumns']);
            add_action("manage_{$slug}_posts_custom_column", [$this, 'setCustomColumn']);
        }
    }

    protected function getCustomColumns(): ?array
    {
        return [
            'thumbnail'  => __('Image'),
            'title'  => __('Title'),
        ];
    }

    private function setCustomColumns(string $slug): void
    {
        add_filter(
            "manage_{$slug}_posts_columns",
            fn () => array_merge(['cb' => '<input type="checkbox" />'], $this->getCustomColumns())
        );
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
        }
    }

    public function registerSortableCustomColumns(array $columns): array
    {
        $customColumns = $this->getCustomColumns();

        foreach ($customColumns as $key => $value) {
            $columns[$key] = $key;
        }

        return $columns;
    }
}
