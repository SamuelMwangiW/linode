<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Firewall;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class CreateRequest extends AuthenticatedRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly array $data
    ) {
    }

    public function defaultBody(): array
    {
        return $this->data;
    }

    public function resolveEndpoint(): string
    {
        return 'networking/firewalls';
    }
}
