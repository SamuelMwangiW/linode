<?php

namespace SamuelMwangiW\Linode\Request\Firewall;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ListRequest extends LinodeRequest
{
    protected string $path = 'networking/firewalls';
}
