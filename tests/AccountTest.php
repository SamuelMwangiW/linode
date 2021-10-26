<?php

use SamuelMwangiW\Linode\Linode;

it('authenticate throws an exception when linode.config is not set', function () {
    config()->set('linode.token', '');
    \SamuelMwangiW\Linode\Request\Account\GetRequest::build()->fetch();
})->throws(\SamuelMwangiW\Linode\Exceptions\CredentialsMissing::class);

it('linode returns an account')
    ->expect(fn () => Linode::account())
        ->toBeInstanceOf(\SamuelMwangiW\Linode\DTO\AccountDTO::class)
        ->company->toBe('mwangithegreat')
        ->email->toBe('samuel@samuelmwangi.co.ke')
        ->uid->toBe('D09103B1-20FE-11EA-B88C0CC47AEB2714');
