<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ShowRequest extends AuthenticatedRequest
{
    public function __construct(
        private string $firewallId
    )
    {
    }

    public function defineEndpoint(): string
    {
        return "networking/firewalls/{$this->firewallId}";
    }
}
