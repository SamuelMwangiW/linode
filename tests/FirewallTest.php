<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\FirewallDTO;
use SamuelMwangiW\Linode\DTO\FirewallRulesDTO;
use SamuelMwangiW\Linode\Linode;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall;

it('gets the firewall list')
    ->tap(fn()=>fakeSaloonRequest(Firewall\ListRequest::class))
    ->expect(fn () => Linode::firewall()->list())
    ->toBeCollection()
    ->each->toBeInstanceOf(FirewallDTO::class);

it('gets a firewall by id')
    ->tap(fn()=>fakeSaloonRequest(Firewall\ShowRequest::class))
    ->with('firewall-id')
    ->expect(fn ($firewallId) => Linode::firewall()->show($firewallId))
    ->toBeInstanceOf(FirewallDTO::class);

it('deletes a firewall by id')
    ->tap(fn()=>fakeSaloonRequest(Firewall\DeleteRequest::class))
    ->with('delete-id')
    ->expect(fn ($firewallId) => Linode::firewall()->destroy($firewallId))
    ->status()->toBe(200);

it('gets the firewall rules')
    ->tap(fn()=>fakeSaloonRequest(Firewall\Rules\ListRequest::class))
    ->with('firewall-id')
    ->expect(fn ($firewallId) => Linode::firewall()->rules()->show($firewallId))
    ->toBeInstanceOf(FirewallRulesDTO::class);
