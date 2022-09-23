<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode;

use SamuelMwangiW\Linode\Domain\Account;
use SamuelMwangiW\Linode\Domain\Billing;
use SamuelMwangiW\Linode\Domain\Firewall;
use SamuelMwangiW\Linode\Domain\Image;
use SamuelMwangiW\Linode\Domain\Instance;
use SamuelMwangiW\Linode\Domain\Region;

class Linode
{
    public static function __callStatic(string $name, array $arguments)
    {
        return (new static())->$name(...$arguments);
    }

    /**
     * @return DTO\AccountDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public function account(): DTO\AccountDTO
    {
        return Account::details();
    }

    public function images(): Image
    {
        return new Image();
    }

    public function instance(): Instance
    {
        return new Instance();
    }

    public function region(): Region
    {
        return new Region();
    }

    public function billing(): Billing
    {
        return new Billing();
    }

    public function firewall(): Firewall
    {
        return new Firewall();
    }
}
