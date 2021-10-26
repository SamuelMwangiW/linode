<?php

namespace SamuelMwangiW\Linode\Request\Instance;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class CreateRequest extends LinodeRequest
{
    protected string $method = 'POST';
    protected string $path = 'linode/instances';
}
