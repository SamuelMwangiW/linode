<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Images;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;
use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class CreateRequest extends AuthenticatedRequest
{
    use HasJsonBody;

    protected ?string $method = Saloon::POST;

    public function __construct(
        private array $data,
    ) {
    }

    public function defaultData(): array
    {
        return $this->data;
    }

    public function defineEndpoint(): string
    {
        return 'images';
    }
}
