<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Billing;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class PlansListRequest extends LinodeRequest
{
    protected string $path = 'linode/types';
}
