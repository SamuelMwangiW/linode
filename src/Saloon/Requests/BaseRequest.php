<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use SamuelMwangiW\Linode\Saloon\BaseConnector;

abstract class BaseRequest extends SaloonRequest
{
    protected ?string $connector = BaseConnector::class;

    protected ?string $method = Saloon::GET;
}
