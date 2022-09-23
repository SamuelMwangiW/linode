<?php

use SamuelMwangiW\Linode\Linode;

if (!function_exists('linode')) {
    function linode(): Linode
    {
        return new Linode();
    }
}
