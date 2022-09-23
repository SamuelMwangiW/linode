<?php

namespace SamuelMwangiW\Linode\Saloon\Requests\Account;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class GetRequest extends AuthenticatedRequest
{
    public function defineEndpoint(): string
    {
        return 'account';
    }
}
