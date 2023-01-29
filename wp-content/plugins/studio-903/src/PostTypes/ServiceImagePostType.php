<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class ServiceImagePostType extends AbstractPostType
{
    protected string $label = 'Services images';

    protected string $pageTitle = 'Services images';

    protected string $menuTitle = 'Images';
}
