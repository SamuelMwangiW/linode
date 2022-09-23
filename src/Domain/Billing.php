<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\Factory\PlanFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Billing\PlansListRequest;

class Billing
{
    public function plans()
    {
        return PlansListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $plan) => PlanFactory::make($plan));
    }
}
