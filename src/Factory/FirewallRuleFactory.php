<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Factory;

use Illuminate\Support\Str;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\FirewallRuleDTO;
use SamuelMwangiW\Linode\Enum\FirewallRule;

class FirewallRuleFactory implements FactoryContract
{
    public static function make(array $data): FirewallRuleDTO
    {
        return new FirewallRuleDTO(
            protocol: $data['protocol'],
            action: FirewallRule::from($data['action']),
            label: $data['label'],
            addresses: collect($data['addresses']),
            ports: Str::of($data['ports'] ?? '')->remove(' ')->explode(','),
        );
    }
}
