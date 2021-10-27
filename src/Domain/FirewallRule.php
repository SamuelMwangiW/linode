<?php

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;
use SamuelMwangiW\Linode\Factory\FirewallRulesFactory;
use SamuelMwangiW\Linode\Request\Firewall\Rules\ListRequest;

class FirewallRule
{
    public function show($firewallId): FirewallRulesDTO
    {
        return FirewallRulesFactory::make(
            data: ListRequest::build()
                ->setPath("networking/firewalls/{$firewallId}/rules")
                ->fetch()
                ->json()
        );
    }
}
