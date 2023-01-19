<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class ClientPostType extends AbstractPostType
{
    protected string $pageTitle = 'All clients';

    protected string $menuTitle = 'Clients';

    protected string $icon = 'dashicons-businessman';
}
