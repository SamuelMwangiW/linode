<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SamuelMwangiW\Linode\LinodeServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->travelTo('2018-01-01T00:01:01');
    }

    protected function getPackageProviders($app): array
    {
        return [
            LinodeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('linode.environment', 'testing');
        config()->set('linode.token', '644e87didyousurelyexpectmetocommittheactualkey2680ea1d15b8c5f122');
    }
}
