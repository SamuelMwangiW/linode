<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Illuminate\Support\Collection;

class FirewallRuleDTO implements \SamuelMwangiW\Linode\Contracts\DTOContract
{
    public function __construct(
        public string $protocol,
        public string $action,
        public string $label,
        public Collection $addresses,
        public ?Collection $ports,
    ) {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'protocol' => $this->protocol,
            'action' => $this->action,
            'label' => $this->label,
            'addresses' => $this->addresses->toArray(),
            'ports' => $this->ports?->toArray(),
        ];
    }
}
