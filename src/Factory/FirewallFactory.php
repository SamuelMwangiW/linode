<?php

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use Illuminate\Support\Str;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\FirewallDTO;
use SamuelMwangiW\Linode\DTO\FirewallRuleDTO;
use SamuelMwangiW\Linode\Enum\FirewallRule;

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
            inbound_rules: collect($data['rules']['inbound'])
                ->map(
                    fn (array $rule) => new FirewallRuleDTO(
                        protocol: $rule['protocol'],
                        action: FirewallRule::from($rule['action']),
                        label: $rule['label'],
                        addresses: collect($rule['addresses']),
                        ports: Str::of($rule['ports'] ?? '')->remove(' ')->explode(','),
                    )
                ),
            outbound_rules: collect($data['rules']['outbound']),
            inbound_policy: FirewallRule::from($data['rules']['inbound_policy']),
            outbound_policy: FirewallRule::from($data['rules']['outbound_policy']),
            tags: collect($data['tags']),
        );
    }
}
