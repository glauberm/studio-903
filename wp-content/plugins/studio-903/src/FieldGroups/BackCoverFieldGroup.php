<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class BackCoverFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_back_cover',
            'title' => 'Back cover',
            'fields' => [
                [
                    'key' => 'back_cover_primary_cta_label',
                    'label' => 'Primary call-to-action label',
                    'name' => 'back_cover_primary_cta_label',
                    'type' => 'text',
                ],
                [
                    'key' => 'back_cover_secondary_cta_label',
                    'label' => 'Secondary call-to-action label',
                    'name' => 'back_cover_secondary_cta_label',
                    'type' => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'page',
                        'operator' => '==',
                        'value' => $_ENV['WP_PAGE_ID_BACK_COVER_EN'],
                    ],
                ],
                [
                    [
                        'param' => 'page',
                        'operator' => '==',
                        'value' => $_ENV['WP_PAGE_ID_BACK_COVER_PT'],
                    ],
                ],
            ],
        ];
    }
}
