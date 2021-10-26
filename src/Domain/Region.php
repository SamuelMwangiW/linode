<?php

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Factory\RegionFactory;
use SamuelMwangiW\Linode\Request\Regions\ListRequest;

class Region
{
    public function list(): Collection
    {
        return ListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn(array $region) => RegionFactory::make($region));
    }
}
