<?php

use SamuelMwangiW\Linode\Saloon\Requests;

it('fakes requests', function ($requestClass, $fixture) {
    fakeSaloonRequest($requestClass);

    $expectedResponse = json_decode(
        json:file_get_contents(__DIR__ . "/Fixtures/{$fixture}.json"),
        associative: true
    );

    $receivedResponse = (new $requestClass)
        ->send()
        ->throw()
        ->json();

    expect($receivedResponse)->toBe($expectedResponse);
})->with([
    'regions list request' => [Requests\Regions\ListRequest::class, 'get/regions'],
]);
