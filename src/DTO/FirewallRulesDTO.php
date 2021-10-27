<?php

namespace SamuelMwangiW\Linode\DTO;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class FirewallRulesDTO implements DTOContract
{
    public function __construct(
        public Collection $inbound,
        public string     $inbound_policy,
        public Collection $outbound,
        public string     $outbound_policy,
    )
    {
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }

    public function __toArray(): array
    {
        // TODO: Implement __toArray() method.
    }
}
