<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\IPAddress;

it('returns true for ipv4 addresses', function (string $ip) {
    $IpAddressObj = new IPAddress($ip);

    expect($IpAddressObj)
        ->ip->toBe($ip)
        ->isV4()->toBeTrue()
        ->isV6()->toBeFalse();
})->with('valid-ipv4');

it('returns true for private ipv4 addresses', function (string $ip) {
    $IpAddressObj = new IPAddress($ip);

    expect($IpAddressObj)
        ->ip->toBe($ip)
        ->isV4()->toBeTrue()
        ->isPrivate()->toBeTrue()
        ->isPublic()->toBeFalse();
})->with('private-ipv4');

it('returns true for public ipv4 addresses', function (string $ip) {
    $IpAddressObj = new IPAddress($ip);

    expect($IpAddressObj)
        ->ip->toBe($ip)
        ->isV4()->toBeTrue()
        ->isPublic()->toBeTrue()
        ->isPrivate()->toBeFalse();
})->with('public-ipv4');
