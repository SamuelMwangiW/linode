<?php

use SamuelMwangiW\Linode\DTO\PlanDTO;
use SamuelMwangiW\Linode\Linode;

it("lists available linode plans")
    ->expect(fn () => Linode::billing()->plans())
    ->toBeCollection()
    ->first()->toBeInstanceOf(PlanDTO::class);
