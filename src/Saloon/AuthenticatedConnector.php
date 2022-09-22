<?php

namespace SamuelMwangiW\Linode\Saloon;

use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;

class AuthenticatedConnector extends BaseConnector
{
    public function defaultAuth(): AuthenticatorInterface
    {
        return new TokenAuthenticator(
            token: config('linode.token')
        );
    }
}
