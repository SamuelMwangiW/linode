<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Images;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class ShowRequest extends LinodeRequest
{
    protected string $method = 'GET';
}
