<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

class CreatorFieldGroup extends FieldGroup
{
    public function get(): array
    {
        return [
            'key' => 'group_creator',
            'title' => 'Creator',
            'fields' => [
                [
                    'key' => 'creator_cta_label',
                    'label' => 'Call-to-action label',
                    'name' => 'creator_cta_label',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'key' => 'creator_images',
                    'label' => 'Images',
                    'name' => 'creator_images',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'creator_image_0',
                            'label' => 'Image #1',
                            'name' => 'creator_image_0',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                        ],
                        [
                            'key' => 'creator_image_1',
                            'label' => 'Image #2',
                            'name' => 'creator_image_1',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_2',
                            'label' => 'Image #3',
                            'name' => 'creator_image_2',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_3',
                            'label' => 'Image #4',
                            'name' => 'creator_image_3',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_4',
                            'label' => 'Image #5',
                            'name' => 'creator_image_4',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_5',
                            'label' => 'Image #6',
                            'name' => 'creator_image_5',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_6',
                            'label' => 'Image #7',
                            'name' => 'creator_image_6',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                        [
                            'key' => 'creator_image_7',
                            'label' => 'Image #8',
                            'name' => 'creator_image_7',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 0,
                        ],
                    ],
                ],
                [
                    'key' => 'creator_video',
                    'label' => 'Video',
                    'name' => 'creator_video',
                    'type' => 'group',
                    'required' => 0,
                    'sub_fields' => [
                        [
                            'key' => 'creator_video_file',
                            'label' => 'Video',
                            'name' => 'creator_video_file',
                            'type' => 'file',
                            'instructions' => 'Max 20 MB.',
                            'required' => 0,
                            'return_format' => 'array',
                            'library' => 'all',
                            'max_size' => 20,
                            'mime_types' => 'mp4',
                        ],
                        [
                            'key' => 'creator_video_poster',
                            'label' => 'Poster',
                            'name' => 'creator_video_poster',
                            'type' => 'image',
                            'return_format' => 'id',
                            'library' => 'all',
                            'allowed_file_types' => 'jpg,jpeg,webp',
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'field' => 'creator_video_file',
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
                        'value' => 'creator',
                    ],
                ],
            ],
        ];
    }
}
