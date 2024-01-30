<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;
use SamuelMwangiW\Linode\Facades\Linode;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Account\GetRequest;

it('authenticate throws an exception when linode.config is not set', function () {
    config()->set('linode.token', '');
    $request = GetRequest::make();

    AuthenticatedConnector::make()->send($request)->throw();
})->throws(CredentialsMissing::class);

it('linode returns an account')
    ->tap(fn () => fakeSaloonRequest(GetRequest::class))
    ->expect(fn () => Linode::account())
    ->toBeInstanceOf(AccountDTO::class)
    ->company->toBe('Test Company Unlimited')
    ->email->toBe('user@example.com')
    ->uid->toBe('D09103B1-FFFF-AAAA-B88C000000000004');
