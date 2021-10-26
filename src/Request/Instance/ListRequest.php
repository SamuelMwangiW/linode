<?php

namespace SamuelMwangiW\Linode\Request\Instance;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ListRequest extends LinodeRequest
{
    protected string $path = 'linode/instances';
}
