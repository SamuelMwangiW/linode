<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;
use SamuelMwangiW\Linode\Linode;
use SamuelMwangiW\Linode\Transporter\Request\Account\GetRequest;

it('authenticate throws an exception when linode.config is not set', function () {
    config()->set('linode.token', '');
    GetRequest::build()->fetch();
})->throws(CredentialsMissing::class);

it('linode returns an account')
    ->expect(fn () => Linode::account())
        ->toBeInstanceOf(AccountDTO::class)
        ->company->toBe('mwangithegreat')
        ->email->toBe('samuel@samuelmwangi.co.ke')
        ->uid->toBe('D09103B1-20FE-11EA-B88C0CC47AEB2714');
