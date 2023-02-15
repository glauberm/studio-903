<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Studio903\Studio903;

final class Studio903Test extends TestCase
{
    public function testHealth()
    {
        new Studio903();

        $this->expectNotToPerformAssertions();
    }
}
