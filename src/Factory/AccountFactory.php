<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\AccountDTO;

class AccountFactory implements FactoryContract
{
    public static function make(array $data): AccountDTO
    {
        return new AccountDTO(
            uid: $data['euuid'],
            company: $data['company'],
            email: $data['email'],
            first_name: $data['first_name'],
            last_name: $data['last_name'],
            address_1: $data['address_1'],
            address_2: $data['address_2'],
            city: $data['city'],
            state: $data['state'],
            zip: $data['zip'],
            country: $data['country'],
            phone: $data['phone'],
            balance: $data['balance'],
            uninvoiced: $data['balance_uninvoiced'],
            active_since: Carbon::parse($data['active_since']),
        );
    }
}
