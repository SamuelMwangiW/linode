<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class RegionDTO implements DTOContract
{
    public function __construct(
        public string $id,
        public string $country,
        public string $status,
        public Collection $resolvers,
        public Collection $capabilities,
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
            'country' => $this->country,
            'status' => $this->status,
            'resolvers' => $this->resolvers->toArray(),
            'capabilities' => $this->capabilities->toArray(),
        ];
    }
}
