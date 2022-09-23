<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;
use SamuelMwangiW\Linode\Factory\FirewallRulesFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\Rules\ListRequest;

class FirewallRule
{
    /**
     * @param $firewallId
     * @return FirewallRulesDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public function show($firewallId): FirewallRulesDTO
    {
        return FirewallRulesFactory::make(
            data: ListRequest::make($firewallId)
                ->send()
                ->throw()
                ->json()
        );
    }
}
