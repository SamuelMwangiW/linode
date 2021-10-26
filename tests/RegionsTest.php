<?php

use SamuelMwangiW\Linode\{Linode,DTO\RegionDTO};

it("lists available regions")
    ->expect(fn()=> Linode::region()->list())
    ->toBeCollection()->first()->toBeInstanceOf(RegionDTO::class);
