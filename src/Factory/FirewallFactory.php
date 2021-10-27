<?php

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\FirewallDTO;

class FirewallFactory implements FactoryContract
{
    public static function make(array $data): FirewallDTO
    {
        return new FirewallDTO(
            id: $data['id'],
            label: $data['label'],
            created: Carbon::parse($data['created']),
            updated: Carbon::parse($data['updated']),
            status: $data['status'],
            rules: FirewallRulesFactory::make($data['rules']),
            tags: collect($data['tags']),
        );
    }
}
