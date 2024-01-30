<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Factory;

use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\IPAddress;
use SamuelMwangiW\Linode\DTO\RegionDTO;

class RegionFactory implements FactoryContract
{
    public static function make(array $data): RegionDTO
    {
        return new RegionDTO(
            id: $data['id'],
            country: $data['country'],
            status: $data['status'],
            resolvers: collect(
                explode(',', $data['resolvers']['ipv4'])
            )
                ->map(fn (string $ip) => trim($ip))
                ->map(fn (string $ip) => new IPAddress($ip)),
            capabilities: collect($data['capabilities']),
        );
    }
}
