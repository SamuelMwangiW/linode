<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Instance;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class UpdateRequest extends LinodeRequest
{
    protected string $method = 'PUT';
}
