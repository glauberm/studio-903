<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class CreatorImagePostType extends AbstractPostType
{
    protected string $label = 'Artists + Creators images';

    protected string $pageTitle = 'All Artists + Creators images';

    protected string $menuTitle = 'Images';
}
