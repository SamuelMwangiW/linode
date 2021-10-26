<?php

namespace SamuelMwangiW\Linode\Tests;

use Carbon\Carbon;
use Orchestra\Testbench\TestCase as Orchestra;
use SamuelMwangiW\Linode\LinodeServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->freezeTime();
    }

    protected function getPackageProviders($app)
    {
        return [
            LinodeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('linode.environment', 'testing');
        config()->set('linode.token', '644e87didyousurelyexpectmetocommittheactualkey2680ea1d15b8c5f122');
    }

    private function freezeTime()
    {
        Carbon::setTestNow('2018-01-01T00:01:01');
    }
}
