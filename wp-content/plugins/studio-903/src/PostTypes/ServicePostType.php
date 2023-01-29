<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class ServicePostType extends AbstractPostType
{
    protected string $label = 'Services';

    protected string $pageTitle = 'Services';

    protected string $menuTitle = 'Services';

    protected string $icon = 'dashicons-index-card';
}
