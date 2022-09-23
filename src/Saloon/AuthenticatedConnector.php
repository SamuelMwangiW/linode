<?php

namespace SamuelMwangiW\Linode\Saloon;

use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;

class AuthenticatedConnector extends BaseConnector
{
    /**
     * @throws CredentialsMissing
     */
    public function defaultAuth(): AuthenticatorInterface
    {
        $token = config('linode.token');

        if (blank($token)){
            throw new CredentialsMissing();
        }

        return new TokenAuthenticator(token: $token);
    }
}
