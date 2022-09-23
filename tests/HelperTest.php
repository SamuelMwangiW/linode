<?php

use SamuelMwangiW\Linode\Linode;

test('linode function is defined')
    ->expect(fn() => function_exists('linode'))
    ->toBeTrue();

test('it resolved Linode::class from the container', function () {
    expect(linode())->toBeInstanceOf(Linode::class);
});
