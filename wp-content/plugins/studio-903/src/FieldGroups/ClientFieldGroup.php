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
