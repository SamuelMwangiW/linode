<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Regions;

use SamuelMwangiW\Linode\Saloon\Requests\BaseRequest;

class ListRequest extends BaseRequest
{
    public function defineEndpoint(): string
    {
        return 'regions';
    }
}
