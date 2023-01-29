<?php

declare(strict_types=1);

namespace Studio903\PostTypes;

use Studio903\PostTypes\AbstractPostType;

class BenefitsPostType extends AbstractPostType
{
    protected string $label = 'Benefits';

    protected string $pageTitle = 'Benefits';

    protected string $menuTitle = 'Benefits';

    protected string $icon = 'dashicons-lightbulb';
}
