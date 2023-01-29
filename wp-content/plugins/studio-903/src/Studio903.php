<?php

declare(strict_types=1);

namespace Studio903;

use Studio903\PostTypes\AboutPostType;
use Studio903\PostTypes\BenefitsPostType;
use Studio903\PostTypes\ClientPostType;
use Studio903\PostTypes\ContactPostType;
use Studio903\PostTypes\CreatorImagePostType;
use Studio903\PostTypes\CreatorPostType;
use Studio903\PostTypes\ServiceImagePostType;
use Studio903\PostTypes\ServicePostType;
use Studio903\PostTypes\SocialPostType;
use Studio903\PostTypes\StudioImagePostType;
use Studio903\PostTypes\StudioPostType;

class Studio903
{
    public function __construct(public readonly Editor $editor, public readonly TidyingRay $tidyingRay)
    {
        $this->register();
    }

    private function register()
    {
        new AboutPostType('about');
        new BenefitsPostType('benefits');
        new StudioPostType('studio');
        new StudioImagePostType('studio_image', parent: 'studio');
        new ServicePostType('service');
        new ServiceImagePostType('service_image', parent: 'service');
        new CreatorPostType('creator');
        new CreatorImagePostType('creator_image', parent: 'creator');
        new ClientPostType('client');
        new ContactPostType('contact');
        new SocialPostType('social');
    }
}
