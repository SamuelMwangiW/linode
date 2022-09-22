<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SamuelMwangiW\Linode\Linode
 */
class LinodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'linode';
    }
}
