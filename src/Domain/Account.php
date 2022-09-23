<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Factory\AccountFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Account\GetRequest;

class Account
{
    public static function details(): AccountDTO
    {
        $response = GetRequest::make()
            ->send()
            ->throw();

        return AccountFactory::make($response->json());
    }
}
