<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;
use SamuelMwangiW\Linode\Factory\FirewallRulesFactory;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\BaseConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\Rules\ListRequest;

class FirewallRule
{
    /**
     * @param $firewallId
     * @return FirewallRulesDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function show($firewallId): FirewallRulesDTO
    {
        $connector = AuthenticatedConnector::make();
        $request = ListRequest::make($firewallId);

        return FirewallRulesFactory::make(
            data: $connector->send($request)
                ->throw()
                ->json()
        );
    }
}
