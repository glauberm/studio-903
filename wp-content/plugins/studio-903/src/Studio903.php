<?php

declare(strict_types=1);

namespace Studio903;

use GuzzleHttp\Client;
use Monolog\Logger;
use Studio903\FieldGroups\BackCoverFieldGroup;
use Studio903\FieldGroups\ClientFieldGroup;
use Studio903\FieldGroups\ContactFieldGroup;
use Studio903\FieldGroups\CoverFieldGroup;
use Studio903\FieldGroups\CreatorFieldGroup;
use Studio903\FieldGroups\ServiceFieldGroup;
use Studio903\FieldGroups\SocialFieldGroup;
use Studio903\FieldGroups\StudioFieldGroup;
use Studio903\Form\Form;
use Studio903\PostTypes\BenefitPostType;
use Studio903\PostTypes\ClientPostType;
use Studio903\PostTypes\ContactPostType;
use Studio903\PostTypes\CreatorPostType;
use Studio903\PostTypes\ServicePostType;
use Studio903\PostTypes\SocialPostType;
use Studio903\PostTypes\StudioPostType;
use WP_Query;

class Studio903
{
    const TIMEZONE = 'America/Sao_Paulo';

    public BenefitPostType $benefits;
    public StudioPostType $studios;
    public ServicePostType $services;
    public CreatorPostType $creators;
    public ClientPostType $clients;
    public ContactPostType $contacts;
    public SocialPostType $socials;
    public Form $form;

    public function __construct(
        private readonly Client $httpClient,
        private readonly Logger $logger,
    ) {
        TidyingRay::tidyUp();

        $this->postTypes();

        $this->fieldGroups();

        $this->form = new Form($this->httpClient, $this->logger);
    }

    public function html(?string $string): void
    {
        echo (bool) $string ? esc_html($string) : null;
    }

    public function attr(?string $string): void
    {
        echo (bool) $string ? esc_attr($string) : null;
    }

    public function section(string $ptPagename, string $enPagename): WP_Query
    {
        switch (pll_current_language()) {
            case 'pt':
                return new WP_Query(['pagename' => $ptPagename]);
            default:
                return new WP_Query(['pagename' => $enPagename]);
        }
    }

    private function postTypes(): void
    {
        $this->studios = (new StudioPostType())->init();
        $this->services = (new ServicePostType())->init();
        $this->creators = (new CreatorPostType())->init();
        $this->benefits = (new BenefitPostType())->init();
        $this->clients = (new ClientPostType())->init();
        $this->socials = (new SocialPostType())->init();
        $this->contacts = (new ContactPostType())->init();
    }

    private function fieldGroups(): void
    {
        (new BackCoverFieldGroup())->init();
        (new ClientFieldGroup())->init();
        (new ContactFieldGroup())->init();
        (new CoverFieldGroup())->init();
        (new CreatorFieldGroup())->init();
        (new ServiceFieldGroup())->init();
        (new SocialFieldGroup())->init();
        (new StudioFieldGroup())->init();
    }
}
