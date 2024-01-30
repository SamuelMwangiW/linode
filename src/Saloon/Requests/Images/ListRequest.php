<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Images;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ListRequest extends AuthenticatedRequest
{
    public function resolveEndpoint(): string
    {
        return 'images';
    }
}
