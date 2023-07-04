<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;

class AuthenticatedConnector extends BaseConnector
{
    /**
     * @throws CredentialsMissing
     */
    public function defaultAuth(): Authenticator
    {
        $token = config('linode.token');

        if (blank($token)) {
            throw new CredentialsMissing();
        }

        return new TokenAuthenticator(token: $token);
    }
}
