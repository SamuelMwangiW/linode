<?php

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\Factory\PlanFactory;
use SamuelMwangiW\Linode\Request\Billing\PlansListRequest;

class Billing
{
    public function plans()
    {
        return PlansListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn(array $plan)=>PlanFactory::make($plan));
    }
}
