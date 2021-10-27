<?php

namespace SamuelMwangiW\Linode\Factory;

use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;

class FirewallRulesFactory implements FactoryContract
{

    public static function make(array $data): FirewallRulesDTO
    {
        return new FirewallRulesDTO(
            inbound: collect($data['inbound'])->map(fn($rule)=>FirewallRuleFactory::make($rule)),
            inbound_policy: $data['inbound_policy'],
            outbound: collect($data['outbound'])->map(fn($rule)=>FirewallRuleFactory::make($rule)),
            outbound_policy: $data['outbound_policy'],
        );
    }
}
