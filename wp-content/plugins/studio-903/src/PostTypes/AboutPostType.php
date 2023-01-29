<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class AboutPostType extends AbstractPostType
{
    protected string $label = 'About';

    protected string $pageTitle = 'About';

    protected string $menuTitle = 'About';

    protected string $icon = 'dashicons-id-alt';
}
