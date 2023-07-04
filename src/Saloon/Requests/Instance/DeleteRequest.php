<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use Saloon\Enums\Method;
use Sammyjo20\Saloon\Constants\Saloon;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class DeleteRequest extends AuthenticatedRequest
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly string|int $instanceId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}";
    }
}
