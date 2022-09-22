<?php

declare(strict_types=1);

use JustSteveKing\StatusCode\Http;
use SamuelMwangiW\Linode\Linode;

it('gets the firewall list')
    ->expect(fn () => Linode::firewall()->list())
    ->toBeCollection()
    ->first()->toBeInstanceOf(\SamuelMwangiW\Linode\DTO\FirewallDTO::class);

it('gets a firewall by id')
    ->with('firewall-id')
    ->expect(fn ($firewallId) => Linode::firewall()->show($firewallId))
    ->toBeInstanceOf(\SamuelMwangiW\Linode\DTO\FirewallDTO::class);

it('deletes a firewall by id')
//    ->skip()
    ->with('delete-id')
    ->expect(fn ($firewallId) => Linode::firewall()->destroy($firewallId))
    ->status()->toBe(Http::OK);

it('gets the firewall rules')
    ->with('firewall-id')
    ->expect(fn ($firewallId) => Linode::firewall()->rules()->show($firewallId))
    ->toBeInstanceOf(\SamuelMwangiW\Linode\DTO\FirewallRulesDTO::class);
