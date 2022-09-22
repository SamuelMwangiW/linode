<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode;

use JetBrains\PhpStorm\Pure;
use SamuelMwangiW\Linode\Domain\Account;
use SamuelMwangiW\Linode\Domain\Billing;
use SamuelMwangiW\Linode\Domain\Firewall;
use SamuelMwangiW\Linode\Domain\Image;
use SamuelMwangiW\Linode\Domain\Instance;
use SamuelMwangiW\Linode\Domain\Region;

class Linode
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     * @throws Exceptions\CredentialsMissing
     */
    public static function account(): DTO\AccountDTO
    {
        return Account::details();
    }

    #[Pure]
    public static function images(): Image
    {
        return new Image();
    }

    #[Pure]
    public static function instance(): Instance
    {
        return new Instance();
    }

    #[Pure]
    public static function region(): Region
    {
        return new Region();
    }

    #[Pure]
    public static function billing(): Billing
    {
        return new Billing();
    }

    public static function firewall()
    {
        return new Firewall();
    }
}
