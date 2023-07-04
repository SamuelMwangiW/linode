<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\DTO\RegionDTO;
use SamuelMwangiW\Linode\Factory\RegionFactory;
use SamuelMwangiW\Linode\Saloon\BaseConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Regions\ListRequest;

class Region
{
    /**
     * @return Collection<RegionDTO>
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function list(): Collection
    {
        $connector = BaseConnector::make();
        $request = ListRequest::make();

        return $connector->send($request)
            ->throw()
            ->collect('data')
            ->map(fn (array $region) => RegionFactory::make($region));
    }
}
