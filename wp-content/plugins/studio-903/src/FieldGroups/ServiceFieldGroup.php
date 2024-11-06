<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class ServiceFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_service',
            'title' => 'Service',
            'fields' => [
                [
                    'key' => 'service_cta_label',
                    'label' => 'Call-to-action label',
                    'name' => 'service_cta_label',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'service_images',
                    'label' => 'Images',
                    'name' => 'service_images',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'service_image_0',
                            'label' => 'Image #1',
                            'name' => 'service_image_0',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                        ],
                        [
                            'key' => 'service_image_1',
                            'label' => 'Image #2',
                            'name' => 'service_image_1',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_2',
                            'label' => 'Image #3',
                            'name' => 'service_image_2',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_3',
                            'label' => 'Image #4',
                            'name' => 'service_image_3',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_4',
                            'label' => 'Image #5',
                            'name' => 'service_image_4',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_5',
                            'label' => 'Image #6',
                            'name' => 'service_image_5',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_6',
                            'label' => 'Image #7',
                            'name' => 'service_image_6',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'service_image_7',
                            'label' => 'Image #8',
                            'name' => 'service_image_7',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                    ],
                ],
                [
                    'key' => 'service_video',
                    'label' => 'Video',
                    'name' => 'service_video',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'service_video_file',
                            'label' => 'Video',
                            'name' => 'service_video_file',
                            'type' => 'file',
                            'instructions' => 'Max 20 MB.',
                            'required' => 0,
                            'return_format' => 'array',
                            'library' => 'all',
                            'max_size' => 20,
                            'mime_types' => 'mp4',
                        ],
                        [
                            'key' => 'service_video_poster',
                            'label' => 'Poster',
                            'name' => 'service_video_poster',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'field' => 'service_video_file',
                                        'operator' => '!=empty',
                                    ],
                                ],
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
                        'value' => 'service',
                    ],
                ],
            ],
        ];
    }
}
