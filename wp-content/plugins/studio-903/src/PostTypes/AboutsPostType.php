<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class AboutsPostType extends AbstractPostType
{
    protected string $label = 'About sections';

    protected string $pageTitle = 'All About sections';

    protected string $menuTitle = 'About sections';

    protected string $icon = 'dashicons-id-alt';
}
