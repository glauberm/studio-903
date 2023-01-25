<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class ContactPostType extends AbstractPostType
{
    protected string $label = 'Contact methods';

    protected string $pageTitle = 'All contact methods';

    protected string $menuTitle = 'Contact methods';

    protected string $icon = 'dashicons-email';
}
