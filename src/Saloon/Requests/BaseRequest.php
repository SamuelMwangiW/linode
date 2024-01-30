<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseRequest extends Request
{
    protected Method $method = Method::GET;
}
