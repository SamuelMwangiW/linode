<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\InstanceDTO;
use SamuelMwangiW\Linode\DTO\IPAddress;
use SamuelMwangiW\Linode\DTO\ServerSpecificationDTO;

class InstanceFactory implements FactoryContract
{
    public static function make(array $data): InstanceDTO
    {
        return new InstanceDTO(
            id: $data['id'],
            label: $data['label'],
            status: $data['status'],
            specification: new ServerSpecificationDTO(
                disk: $data['specs']['disk'],
                memory: $data['specs']['memory'],
                vcpus: $data['specs']['vcpus'],
                gpus: $data['specs']['gpus'] ?? 0,
                transfer: $data['specs']['transfer'],
            ),
            created: Carbon::parse($data['created']),
            updated: Carbon::parse($data['updated']),
            type: $data['type'],
            ips: collect($data['ipv4'])->map(fn ($ip) => new IPAddress($ip)),
            ipv6: $data['ipv6'],
            image: $data['image'],
            region: $data['region'],
            hypervisor: $data['hypervisor'],
            watchdog_enabled: $data['watchdog_enabled'],
            tags: collect($data['tags']),
        );
    }
}
