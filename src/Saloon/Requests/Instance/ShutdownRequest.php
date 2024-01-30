<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use Saloon\Enums\Method;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ShutdownRequest extends AuthenticatedRequest
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string|int $instanceId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}/shutdown";
    }
}
