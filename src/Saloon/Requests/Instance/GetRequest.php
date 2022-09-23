<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class GetRequest extends AuthenticatedRequest
{
    public function __construct(
        private string|int $id
    ) {
    }

    public function defineEndpoint(): string
    {
        return 'linode/instances/'.$this->id;
    }
}
