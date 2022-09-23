<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Factory\RegionFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Regions\ListRequest;

class Region
{
    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $region) => RegionFactory::make($region));
    }
}
