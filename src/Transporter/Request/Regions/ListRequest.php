<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Regions;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class ListRequest extends LinodeRequest
{
    protected string $path = 'regions';
}
