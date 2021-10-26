<?php

namespace SamuelMwangiW\Linode\Request\Billing;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class PlansListRequest extends LinodeRequest
{
    protected string $path = 'linode/types';
}
