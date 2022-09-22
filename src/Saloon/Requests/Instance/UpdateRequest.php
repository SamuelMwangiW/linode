<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class UpdateRequest extends AuthenticatedRequest
{
    use HasJsonBody;

    protected ?string $method = Saloon::PUT;

    public function __construct(
        private string $instanceId,
        private array $data,
    )
    {
    }

    public function defaultData(): array
    {
        return $this->data;
    }

    public function defineEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}";
    }
}
