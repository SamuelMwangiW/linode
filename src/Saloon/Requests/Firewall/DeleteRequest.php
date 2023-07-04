<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use Saloon\Enums\Method;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class DeleteRequest extends AuthenticatedRequest
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string|int $firewallId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "networking/firewalls/{$this->firewallId}";
    }
}
