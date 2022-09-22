<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Billing;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class PlansListRequest extends LinodeRequest
{
    protected string $path = 'linode/types';
}
