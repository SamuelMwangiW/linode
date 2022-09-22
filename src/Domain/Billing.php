<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\Factory\PlanFactory;
use SamuelMwangiW\Linode\Transporter\Request\Billing\PlansListRequest;

class Billing
{
    public function plans()
    {
        return PlansListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn (array $plan) => PlanFactory::make($plan));
    }
}
