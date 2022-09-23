<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ListRequest extends AuthenticatedRequest
{
    public function defineEndpoint(): string
    {
        return 'networking/firewalls';
    }
}
