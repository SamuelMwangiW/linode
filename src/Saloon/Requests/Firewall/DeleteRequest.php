<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use Sammyjo20\Saloon\Constants\Saloon;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class DeleteRequest extends AuthenticatedRequest
{
    protected ?string $method = Saloon::DELETE;

    public function __construct(
        private string $firewallId
    ) {
    }

    public function defineEndpoint(): string
    {
        return "networking/firewalls/{$this->firewallId}";
    }
}
