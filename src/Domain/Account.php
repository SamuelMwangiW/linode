<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Factory\AccountFactory;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Account\GetRequest;

class Account
{
    /**
     * @return AccountDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public static function details(): AccountDTO
    {
        $request = GetRequest::make();

        $response = AuthenticatedConnector::make()
            ->send($request)
            ->throw();

        return AccountFactory::make($response->json());
    }
}
