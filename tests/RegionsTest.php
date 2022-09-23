<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\RegionDTO;
use SamuelMwangiW\Linode\Linode;
use SamuelMwangiW\Linode\Saloon\Requests;

it('lists available regions')
    ->tap(fn () => fakeSaloonRequest(Requests\Regions\ListRequest::class))
    ->expect(fn () => Linode::region()->list())
    ->toBeCollection()
    ->each->toBeInstanceOf(RegionDTO::class);
