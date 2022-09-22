<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Firewall;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class CreateRequest extends LinodeRequest
{
    protected string $method = 'POST';

    protected string $path = 'networking/firewalls';
}
