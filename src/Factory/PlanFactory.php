<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Factory;

use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\PlanDTO;
use SamuelMwangiW\Linode\DTO\ServerSpecificationDTO;

class PlanFactory implements FactoryContract
{
    public static function make(array $plan): PlanDTO
    {
        return new PlanDTO(
            id: $plan['id'],
            label: $plan['label'],
            hourly_price: $plan['price']['hourly'],
            monthly_price: $plan['price']['monthly'],
            serverSpec: new ServerSpecificationDTO(
                disk: $plan['disk'],
                memory: $plan['memory'],
                vcpus: $plan['vcpus'],
                gpus: $plan['gpus'],
                transfer: $plan['transfer'],
                network_out: $plan['network_out'],
            ),
            class: $plan['class'],
            successor: $plan['successor'],
        );
    }
}
