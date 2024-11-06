<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class ClientFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_client',
            'title' => 'Client',
            'fields' => [
                [
                    'key' => 'client_url',
                    'label' => 'Url',
                    'name' => 'client_url',
                    'aria-label' => '',
                    'type' => 'url',
                    'instructions' => 'URL of the website of the client. Outbound links improve SEO performance.',
                    'required' => 1,
                ],
                [
                    'key' => 'cover_primary_cta_label',
                    'label' => 'Primary call-to-action label',
                    'name' => 'cover_primary_cta_label',
                    'type' => 'text',
                ],
                [
                    'key' => 'cover_secondary_cta_label',
                    'label' => 'Secondary call-to-action label',
                    'name' => 'cover_secondary_cta_label',
                    'type' => 'text',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'client',
                    ],
                ],
            ],
        ];
    }
}
