<?php

namespace SamuelMwangiW\Linode\Factory;

use JetBrains\PhpStorm\Pure;
use SamuelMwangiW\Linode\Contracts\FactoryContract;
use SamuelMwangiW\Linode\DTO\PlanDTO;
use SamuelMwangiW\Linode\DTO\ServerSpecificationDTO;

class PlanFactory implements FactoryContract
{

    #[Pure]
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
