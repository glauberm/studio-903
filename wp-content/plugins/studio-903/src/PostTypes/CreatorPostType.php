<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class CreatorPostType extends AbstractPostType
{
    protected string $label = 'Artists + Creators';

    protected string $pageTitle = 'All artists + creators';

    protected string $menuTitle = 'Artists + creators';

    protected string $icon = 'dashicons-art';
}
