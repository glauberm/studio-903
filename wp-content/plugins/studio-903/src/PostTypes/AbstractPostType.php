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
        'revisions',
        'page-attributes',
    ];

    public function __construct(string $slug, ?string $parent = null)
    {
        parent::__construct($slug, $parent);

        add_action(
            'init',
            function () use ($slug) {
                register_post_type(
                    post_type: $slug,
                    args: [
                        'label' => $this->label,
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => $slug,
                        'supports' => $this->supports,
                    ]
                );
            }
        );

        if ($this->getCustomColumns()) {
            $this->setCustomColumns($slug);
            add_action("manage_{$slug}_posts_custom_column", [$this, 'setCustomColumn']);
        }
    }

    protected function getCustomColumns(): ?array
    {
        return null;
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
        return;
    }
}
