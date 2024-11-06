<?php

declare(strict_types=1);

namespace Studio903\FieldGroups;

abstract class FieldGroup
{
    public function init(): void
    {
        add_action('acf/include_fields', function () {
            acf_add_local_field_group($this->get());
        });
    }

    abstract protected function get(): array;
}
