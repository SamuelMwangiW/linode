<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;
use SamuelMwangiW\Linode\Factory\FirewallRulesFactory;
use SamuelMwangiW\Linode\Transporter\Request\Firewall\Rules\ListRequest;

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
