<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class StudioFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_studio',
            'title' => 'Studio',
            'fields' => [
                [
                    'key' => 'studio_cta_label',
                    'label' => 'Call-to-action label',
                    'name' => 'studio_cta_label',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'studio_images',
                    'label' => 'Images',
                    'name' => 'studio_images',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'studio_image_0',
                            'label' => 'Image #1',
                            'name' => 'studio_image_0',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                        ],
                        [
                            'key' => 'studio_image_1',
                            'label' => 'Image #2',
                            'name' => 'studio_image_1',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_2',
                            'label' => 'Image #3',
                            'name' => 'studio_image_2',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_3',
                            'label' => 'Image #4',
                            'name' => 'studio_image_3',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_4',
                            'label' => 'Image #5',
                            'name' => 'studio_image_4',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_5',
                            'label' => 'Image #6',
                            'name' => 'studio_image_5',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_6',
                            'label' => 'Image #7',
                            'name' => 'studio_image_6',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'studio_image_7',
                            'label' => 'Image #8',
                            'name' => 'studio_image_7',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                    ],
                ],
                [
                    'key' => 'studio_video',
                    'label' => 'Video',
                    'name' => 'studio_video',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'studio_video_file',
                            'label' => 'Video',
                            'name' => 'studio_video_file',
                            'type' => 'file',
                            'instructions' => 'Max 20 MB.',
                            'required' => 0,
                            'return_format' => 'array',
                            'library' => 'all',
                            'max_size' => 20,
                            'mime_types' => 'mp4',
                        ],
                        [
                            'key' => 'studio_video_poster',
                            'label' => 'Poster',
                            'name' => 'studio_video_poster',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'field' => 'studio_video_file',
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
                        'value' => 'studio',
                    ],
                ],
            ],
        ];
    }
}
