<?php

namespace SamuelMwangiW\Linode\DTO;


use Illuminate\Support\Collection;

class FirewallRuleDTO implements \SamuelMwangiW\Linode\Contracts\DTOContract
{
    public function __construct(
        public string     $protocol,
        public string     $action,
        public string     $label,
        public Collection $addresses,
        public ?Collection $ports,
    )
    {

    }

    public
    function __toString(): string
    {
        // TODO: Implement __toString() method.
    }

    public
    function __toArray(): array
    {
        // TODO: Implement __toArray() method.
    }
}
