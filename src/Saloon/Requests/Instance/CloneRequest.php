<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Instance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class CloneRequest extends AuthenticatedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string|int $instanceId,
        private readonly array  $data,
    ) {
    }

    public function defaultBody(): array
    {
        return $this->data;
    }

    public function resolveEndpoint(): string
    {
        return "linode/instances/{$this->instanceId}/clone";
    }
}
