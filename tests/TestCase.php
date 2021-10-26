<?php

namespace SamuelMwangiW\Linode\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase as Orchestra;
use SamuelMwangiW\Linode\LinodeServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->fakeResponses();
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
        config()->set('linode.token', '644e87didyousurelyexpectmetocommittheactualkey2680ea1d15b8c5f122');
    }

    private function fakeResponses()
    {
        Http::fake([
            'https://api.linode.com/v4/account' => file_get_contents(__DIR__ . '/Fixtures/account.json')
        ]);
    }

}
