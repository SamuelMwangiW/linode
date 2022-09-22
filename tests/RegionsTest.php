<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\RegionDTO;
use SamuelMwangiW\Linode\Linode;

it('lists available regions')
    ->expect(fn () => Linode::region()->list())
    ->toBeCollection()->first()->toBeInstanceOf(RegionDTO::class);
