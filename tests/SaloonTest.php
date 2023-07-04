<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\Requests;

it('fakes requests', function ($requestClass, $fixture) {
    fakeSaloonRequest($requestClass);

    $expectedResponse = json_decode(
        json:file_get_contents(__DIR__ . "/Fixtures/{$fixture}.json"),
        associative: true
    );

    $requestObject = (new $requestClass());

    $receivedResponse = \SamuelMwangiW\Linode\Saloon\AuthenticatedConnector::make()
        ->send($requestObject)
        ->throw()
        ->json();

    expect($receivedResponse)->toBe($expectedResponse);
})->with([
    'regions list request' => [Requests\Regions\ListRequest::class, 'get/regions'],
]);
