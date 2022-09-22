<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Transporter\Request\Account;

use SamuelMwangiW\Linode\Transporter\Request\LinodeRequest;

class GetRequest extends LinodeRequest
{
    protected string $path = 'account';
}
