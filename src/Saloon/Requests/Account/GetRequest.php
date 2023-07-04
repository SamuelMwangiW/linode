<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Account;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class GetRequest extends AuthenticatedRequest
{
    public function resolveEndpoint(): string
    {
        return 'account';
    }
}
