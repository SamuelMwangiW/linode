<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ShowRequest extends AuthenticatedRequest
{
    public function __construct(
        private readonly string|int $firewallId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "networking/firewalls/{$this->firewallId}";
    }
}
