<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class FirewallRulesDTO implements DTOContract
{
    public function __construct(
        public Collection $inbound,
        public string $inbound_policy,
        public Collection $outbound,
        public string $outbound_policy,
    ) {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'inbound' => $this->inbound->toArray(),
            'inbound_policy' => $this->inbound_policy,
            'outbound' => $this->outbound->toArray(),
            'outbound_policy' => $this->outbound_policy,
        ];
    }
}
