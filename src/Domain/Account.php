<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\DTO\AccountDTO;
use SamuelMwangiW\Linode\Factory\AccountFactory;
use SamuelMwangiW\Linode\Transporter\Request\Account\GetRequest;

class Account
{
    public static function details(): AccountDTO
    {
        return AccountFactory::make(
            GetRequest::build()->fetch()->json()
        );
    }
}
