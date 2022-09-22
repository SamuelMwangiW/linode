<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Images;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ListRequest extends AuthenticatedRequest
{
    public function defineEndpoint(): string
    {
        return 'images';
    }
}
