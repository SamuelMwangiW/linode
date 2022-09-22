<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\PlanDTO;
use SamuelMwangiW\Linode\Linode;
use SamuelMwangiW\Linode\Saloon\Requests\Billing\PlansListRequest;

it('lists available linode plans')
    ->tap(fn()=>fakeSaloonRequest(PlansListRequest::class))
    ->expect(fn () => Linode::billing()->plans())
    ->toBeCollection()
    ->each->toBeInstanceOf(PlanDTO::class);
