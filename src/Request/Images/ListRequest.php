<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Request\Images;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class ListRequest extends LinodeRequest
{
    protected string $path = 'images';
}
