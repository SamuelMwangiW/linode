<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Instance;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class CloneRequest extends LinodeRequest
{
    protected string $method = 'POST';
}
