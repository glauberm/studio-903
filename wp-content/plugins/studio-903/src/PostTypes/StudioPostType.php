<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class StudioPostType extends AbstractPostType
{
    protected string $pageTitle = 'All studios';

    protected string $menuTitle = 'Studios';

    protected string $icon = 'dashicons-store';
}
