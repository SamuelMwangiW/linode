<?php

namespace SamuelMwangiW\Linode\Factory;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\DTOContract;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\ImageDTO;

class ImageFactory implements FactoryContract
{

    public static function make(array $data): DTOContract
    {
        return new ImageDTO(
            id: $data['id'],
            label: $data['label'],
            deprecated: $data['deprecated'],
            size: $data['size'],
            created: Carbon::parse($data['created']),
            updated: Carbon::parse($data['updated']),
            created_by: $data['created_by'],
            type: $data['type'],
            is_public: $data['is_public'],
            vendor: $data['vendor'],
            expiry: $data['expiry'],
            eol: Carbon::parse($data['eol']),
            status: $data['status'],
        );
    }
}
