<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Images;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ShowRequest extends LinodeRequest
{
    protected string $method = 'GET';
}
