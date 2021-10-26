<?php

namespace SamuelMwangiW\Linode\Request\Instance;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ShutdownRequest extends LinodeRequest
{
    protected string $method = 'POST';
}
