<?php

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\DiskDTO;

class DiskFactory implements FactoryContract
{

    public static function make(array $data): DiskDTO
    {
        return new DiskDTO(
            id: $data['id'],
            status: $data['status'],
            label: $data['label'],
            created: Carbon::parse($data['created']),
            updated: Carbon::parse($data['updated']),
            filesystem: $data['filesystem'],
            size: $data['size'],
        );
    }
}
