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
    public AboutPostType $abouts;
    public BenefitsPostType $benefits;
    public StudioPostType $studios;
    public StudioImagePostType $studiosImages;
    public ServicePostType $services;
    public ServiceImagePostType $servicesImages;
    public CreatorPostType $creators;
    public CreatorImagePostType $creatorsImages;
    public ClientPostType $clients;
    public ContactPostType $contacts;
    public SocialPostType $socials;

    public function __construct(public readonly Editor $editor, public readonly TidyingRay $tidyingRay)
    {
        $this->abouts = new AboutPostType('about');
        // $this->benefits = new BenefitsPostType('benefits');
        $this->studios = new StudioPostType('studio');
        $this->studiosImages = new StudioImagePostType('studio_image', parent: 'studio');
        $this->services = new ServicePostType('service');
        $this->servicesImages = new ServiceImagePostType('service_image', parent: 'service');
        $this->creators = new CreatorPostType('creator');
        $this->creatorsImages = new CreatorImagePostType('creator_image', parent: 'creator');
        $this->clients = new ClientPostType('client');
        $this->contacts = new ContactPostType('contact');
        $this->socials = new SocialPostType('social');
    }

    public function html(?string $string): void
    {
        echo $string ? esc_html($string) : null;
    }

    public function attr(?string $string): void
    {
        echo $string ? esc_attr($string) : null;
    }
}
