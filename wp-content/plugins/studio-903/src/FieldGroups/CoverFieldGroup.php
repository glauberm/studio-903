<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class CoverFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_cover',
            'title' => 'Cover',
            'fields' => [
                [
                    'key' => 'cover_video',
                    'label' => 'Video',
                    'name' => 'cover_video',
                    'type' => 'file',
                    'instructions' => 'Video must not be bigger than 2 MB in order to avoid slow page load. Before the video is downloaded, the featured image will be used.',
                    'required' => 1,
                    'return_format' => 'url',
                    'library' => 'all',
                    'max_size' => 2,
                    'mime_types' => 'mp4',
                ],
                [
                    'key' => 'cover_primary_cta_label',
                    'label' => 'Form button label',
                    'name' => 'cover_primary_cta_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => '50%',
                    ],
                ],
                [
                    'key' => 'cover_secondary_cta_label',
                    'label' => 'Contact button label',
                    'name' => 'cover_secondary_cta_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => '50%',
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page',
                        'operator' => '==',
                        'value' => $_ENV['WP_PAGE_ID_COVER_EN'],
                    ],
                ],
                [
                    [
                        'param' => 'page',
                        'operator' => '==',
                        'value' => $_ENV['WP_PAGE_ID_COVER_PT'],
                    ],
                ],
            ],
        ];
    }
}
