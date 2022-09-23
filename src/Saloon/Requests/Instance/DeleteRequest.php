<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use Sammyjo20\Saloon\Constants\Saloon;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class DeleteRequest extends AuthenticatedRequest
{
    protected ?string $method = Saloon::DELETE;

    public function __construct(
        private string $instanceId
    ) {
    }

    public function defineEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}";
    }
}
