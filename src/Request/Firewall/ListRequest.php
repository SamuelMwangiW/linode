<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Firewall;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ListRequest extends LinodeRequest
{
    protected string $path = 'networking/firewalls';
}
