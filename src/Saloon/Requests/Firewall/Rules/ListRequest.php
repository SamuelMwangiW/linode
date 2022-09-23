<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall\Rules;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ListRequest extends AuthenticatedRequest
{
    public function __construct(
        private string $firewallId
    ) {
    }

    public function defineEndpoint(): string
    {
        return "networking/firewalls/{$this->firewallId}/rules";
    }
}
