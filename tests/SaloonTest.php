<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\Saloon\Requests;

it('fakes requests', function ($requestClass, $fixture) {
    fakeSaloonRequest($requestClass);

    $fixture = json_decode(
        json:file_get_contents(__DIR__ . "/Fixtures/Saloon/{$fixture}.json"),
        associative: true
    );

    $expectedResponse = json_decode(json: $fixture['data'], associative: true);

    $receivedResponse = \SamuelMwangiW\Linode\Saloon\AuthenticatedConnector::make()
        ->send((new $requestClass()))
        ->throw()
        ->json();

    expect($receivedResponse)->toBe($expectedResponse);
})->with([
    'regions list request' => [Requests\Regions\ListRequest::class, 'get/regions'],
    'Linode types request' => [Requests\Billing\PlansListRequest::class, 'get/linode/types'],
]);
