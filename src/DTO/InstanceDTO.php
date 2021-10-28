<?php

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class InstanceDTO implements DTOContract
{
    public function __construct(
        public int                    $id,
        public string                 $label,
        public string                 $status,
        public ServerSpecificationDTO $specification,
        public Carbon                 $created,
        public Carbon                 $updated,
        public string                 $type,
        public Collection             $ips,
        public string                 $ipv6,
        public string                 $image,
        public string                 $region,
        public string                 $hypervisor,
        public bool                   $watchdog_enabled,
        public Collection             $tags,
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
            'status' => $this->status,
            'specification' => $this->specification,
            'created' => $this->created,
            'updated' => $this->updated,
            'type' => $this->type,
            'ips' => $this->ips,
            'ipv6' => $this->ipv6,
            'image' => $this->image,
            'region' => $this->region,
            'hypervisor' => $this->hypervisor,
            'watchdog_enabled' => $this->watchdog_enabled,
            'tags' => $this->tags,
        ];
    }
}
