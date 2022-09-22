<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use SamuelMwangiW\Linode\Contracts\DTOContract;

class ServerSpecificationDTO implements DTOContract
{
    public function __construct(
        public int $disk,
        public int $memory,
        public int $vcpus,
        public int $gpus,
        public int $transfer,
        public ?int $network_out = null,
    ) {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'disk' => $this->disk,
            'memory' => $this->memory,
            'vcpus' => $this->vcpus,
            'gpus' => $this->gpus,
            'transfer' => $this->transfer,
        ];
    }
}
