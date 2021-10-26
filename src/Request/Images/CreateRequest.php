<?php

namespace SamuelMwangiW\Linode\Request\Images;

use SamuelMwangiW\Linode\Request\LinodeRequest;

class CreateRequest extends LinodeRequest
{
    protected string $method = 'POST';
    protected string $path = 'images';
}
