<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Instance;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class DeleteRequest extends LinodeRequest
{
    protected string $method = 'DELETE';
}
