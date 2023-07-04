<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ListRequest extends AuthenticatedRequest
{
    public function resolveEndpoint(): string
    {
        return 'networking/firewalls';
    }
}
