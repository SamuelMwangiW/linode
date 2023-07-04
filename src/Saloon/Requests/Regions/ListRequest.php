<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Regions;

use SamuelMwangiW\Linode\Saloon\Requests\BaseRequest;

class ListRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return 'regions';
    }
}
