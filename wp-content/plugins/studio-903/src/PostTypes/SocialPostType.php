<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class SocialPostType extends AbstractPostType
{
    protected string $label = 'Social media profiles';

    protected string $pageTitle = 'All social media profiles';

    protected string $menuTitle = 'Social media profiles';

    protected string $icon = 'dashicons-share';
}
