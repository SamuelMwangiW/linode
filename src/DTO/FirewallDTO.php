<?php

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class FirewallDTO implements DTOContract
{
    public function __construct(
        public int        $id,
        public string     $label,
        public Carbon     $created,
        public Carbon     $updated,
        public string     $status,
        public Collection $inbound_rules,
        public Collection $outbound_rules,
        public string     $inbound_policy,
        public string     $outbound_policy,
        public Collection $tags,
    ) {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
            'inbound_rules' => (array)$this->inbound_rules,
            'outbound_rules' => (array)$this->outbound_rules,
            'inbound_policy' => $this->inbound_policy,
            'outbound_policy' => $this->outbound_policy,
        ];
    }
}
