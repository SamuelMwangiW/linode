<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Factory\AccountFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Account\GetRequest;

class Account
{
    /**
     * @return AccountDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public static function details(): AccountDTO
    {
        $response = GetRequest::make()
            ->send()
            ->throw();

        return AccountFactory::make($response->json());
    }
}
