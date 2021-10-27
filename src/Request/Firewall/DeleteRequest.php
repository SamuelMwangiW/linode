<?php

namespace SamuelMwangiW\Linode\Request\Firewall;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class DeleteRequest extends LinodeRequest
{
    protected string $method = 'DELETE';
}
