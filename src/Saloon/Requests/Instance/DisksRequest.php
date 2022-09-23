<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class DisksRequest extends AuthenticatedRequest
{
    public function __construct(
        private string|int $instanceId
    ) {
    }

    public function defineEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}/disks";
    }
}
