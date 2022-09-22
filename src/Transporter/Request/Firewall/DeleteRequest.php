<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Firewall;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class DeleteRequest extends LinodeRequest
{
    protected string $method = 'DELETE';
}
