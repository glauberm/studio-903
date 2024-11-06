<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class ContactFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_contact',
            'title' => 'Contact',
            'fields' => [
                [
                    'key' => 'contact_type',
                    'label' => 'Type',
                    'name' => 'contact_type',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => [
                        'whatsapp' => 'WhatsApp',
                        'phone' => 'Landline',
                        'mobile' => 'Mobile phone',
                        'email' => 'Email',
                        'address' => 'Address',
                    ],
                ],
                [
                    'key' => 'contact_phone',
                    'label' => 'Phone number',
                    'name' => 'contact_phone',
                    'type' => 'number',
                    'instructions' => 'Numbers only.',
                    'required' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'contact_type',
                                'operator' => '==',
                                'value' => 'phone',
                            ],
                        ],
                        [
                            [
                                'field' => 'contact_type',
                                'operator' => '==',
                                'value' => 'mobile',
                            ],
                        ],
                        [
                            [
                                'field' => 'contact_type',
                                'operator' => '==',
                                'value' => 'whatsapp',
                            ],
                        ],
                    ],
                ],
                [
                    'key' => 'contact_email',
                    'label' => 'Email address',
                    'name' => 'contact_email',
                    'type' => 'email',
                    'required' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'contact_type',
                                'operator' => '==',
                                'value' => 'email',
                            ],
                        ],
                    ],
                ],
                [
                    'key' => 'contact_address',
                    'label' => 'Google Maps share link',
                    'name' => 'contact_address',
                    'type' => 'url',
                    'instructions' => 'Select the address on Google Maps and click on "Share" to get the link.',
                    'required' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'contact_type',
                                'operator' => '==',
                                'value' => 'address',
                            ],
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'contact',
                    ],
                ],
            ],
        ];
    }
}
