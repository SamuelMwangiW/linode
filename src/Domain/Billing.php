<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\DTO\PlanDTO;
use SamuelMwangiW\Linode\Factory\PlanFactory;
use SamuelMwangiW\Linode\Saloon\BaseConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Billing\PlansListRequest;

class Billing
{
    /**
     * @return Collection<PlanDTO>
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function plans(): Collection
    {
        $request = PlansListRequest::make();

        return BaseConnector::make()
            ->send($request)
            ->throw()
            ->collect('data')
            ->map(fn (array $plan) => PlanFactory::make($plan));
    }
}
