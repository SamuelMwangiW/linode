<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;
use SamuelMwangiW\Linode\Facades\Linode;
use SamuelMwangiW\Linode\Saloon\Requests\Account\GetRequest;

it('authenticate throws an exception when linode.config is not set', function () {
    config()->set('linode.token', '');
    GetRequest::make()->send()->throw();
})->throws(CredentialsMissing::class);

it('linode returns an account')
    ->tap(fn () => fakeSaloonRequest(GetRequest::class))
    ->expect(fn () => Linode::account())
    ->toBeInstanceOf(AccountDTO::class)
    ->company->toBe('mwangithegreat')
    ->email->toBe('samuel@samuelmwangi.co.ke')
    ->uid->toBe('D09103B1-20FE-11EA-B88C0CC47AEB2714');
