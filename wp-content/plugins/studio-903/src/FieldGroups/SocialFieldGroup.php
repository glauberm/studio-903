<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class SocialFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_social',
            'title' => 'Social media profile',
            'fields' => [
                [
                    'key' => 'social_type',
                    'label' => 'Type',
                    'name' => 'social_type',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => [
                        'instagram' => 'Instagram',
                        'facebook' => 'Facebook',
                        'linkedin' => 'LinkedIn',
                    ],
                ],
                [
                    'key' => 'social_url',
                    'label' => 'Url',
                    'name' => 'social_url',
                    'type' => 'url',
                    'required' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'social',
                    ],
                ],
            ],
        ];
    }
}
