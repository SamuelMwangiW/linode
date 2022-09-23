<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\Linode;

if (! function_exists('linode')) {
    function linode(): Linode
    {
        return new Linode();
    }
}
