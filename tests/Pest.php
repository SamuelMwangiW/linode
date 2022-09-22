<?php

declare(strict_types=1);

use Sammyjo20\Saloon\Http\MockResponse;
use Sammyjo20\SaloonLaravel\Facades\Saloon;
use SamuelMwangiW\Linode\Tests\TestCase;
use SamuelMwangiW\Linode\Saloon\Requests;

uses(TestCase::class)->in(__DIR__);

function fakeSaloonRequest(string $request): void
{
    $fixtures = [
        Requests\Regions\ListRequest::class => 'get/regions',
        Requests\Billing\PlansListRequest::class => 'get/linode/types',
        Requests\Instance\DisksRequest::class => 'get/linode/instances/31293947/disks',
        Requests\Instance\GetRequest::class => 'get/linode/instances/31293947',
        Requests\Instance\ListRequest::class => 'get/linode/instances',
        Requests\Instance\CreateRequest::class => 'post/linode/instances',
        Requests\Instance\UpdateRequest::class => 'put/linode/instances/31293947',
        Requests\Instance\CloneRequest::class => 'post/linode/instances/31293947/clone',
        Requests\Instance\DeleteRequest::class => 'delete/linode/instances/31294599',
        Requests\Instance\ShutdownRequest::class => 'post/linode/instances/31293947/shutdown',
    ];

    if (!array_key_exists($request, $fixtures)) {
        throw new RuntimeException("{$request}/fixture mapping is missing");
    }

    $path = __DIR__ . "/Fixtures/{$fixtures[$request]}.json";

    if (!file_exists($path)) {
        throw new RuntimeException("Fixture {$path} for {$request} is missing");
    }

    $response = json_decode(
        json: file_get_contents($path),
        associative: true
    );

    Saloon::fake([
        $request => MockResponse::make($response),
    ]);
}
