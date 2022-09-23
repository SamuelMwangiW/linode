<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \SamuelMwangiW\Linode\Linode
 */
class Linode extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SamuelMwangiW\Linode\Linode::class;
    }
}
