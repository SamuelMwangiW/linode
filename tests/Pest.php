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
    ];

    if (!array_key_exists($request, $fixtures)) {
        return;
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
