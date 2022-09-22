<?php

namespace SamuelMwangiW\Linode\Saloon\Requests;

use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;

abstract class AuthenticatedRequest extends BaseRequest
{
    protected ?string $connector = AuthenticatedConnector::class;
}
