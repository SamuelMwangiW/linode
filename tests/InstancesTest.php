<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\DTO\DiskDTO;
use SamuelMwangiW\Linode\DTO\InstanceDTO;
use SamuelMwangiW\Linode\DTO\ServerSpecificationDTO;
use SamuelMwangiW\Linode\Linode;
use SamuelMwangiW\Linode\Saloon\Requests\Instance;

it('linode returns a list of instances')
    ->tap(fn() => fakeSaloonRequest(Instance\ListRequest::class))
    ->expect(fn() => Linode::instance()->list())
    ->toBeCollection()
    ->first()
    ->hypervisor->toBe('kvm')
    ->first()->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->first()->created->toBeInstanceOf(Carbon::class)
    ->first()->ips->toBeInstanceOf(Collection::class);

it('returns an instance')
    ->tap(fn() => fakeSaloonRequest(Instance\GetRequest::class))
    ->with('instance-id')
    ->expect(fn($instance) => Linode::instance()->show($instance))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->ips->toBeInstanceOf(Collection::class);

it('returns an instance disks')
    ->tap(fn() => fakeSaloonRequest(Instance\DisksRequest::class))
    ->with('instance-id')
    ->expect(fn($instance) => Linode::instance()->disks($instance))
    ->toBeCollection()
    ->first()->toBeInstanceOf(DiskDTO::class);

it('creates an instance')
    ->tap(fn()=>fakeSaloonRequest(Instance\CreateRequest::class))
    ->with('instance')
    ->expect(fn($instance) => Linode::instance()->create(value($instance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('updates an instance')
    ->tap(fn()=>fakeSaloonRequest(Instance\UpdateRequest::class))
    ->with('instance-id', 'instance-update')
    ->expect(fn($instance, $updatedInstance) => Linode::instance()->update(value($instance), value($updatedInstance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('clones an instance')
    ->tap(fn()=>fakeSaloonRequest(Instance\CloneRequest::class))
    ->with('instance-id', 'instance-clone')
    ->expect(fn($instance, $updatedInstance) => Linode::instance()->clone(value($instance), value($updatedInstance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('destroys an instance')
    ->tap(fn()=>fakeSaloonRequest(Instance\DeleteRequest::class))
    ->with('delete-instance-id')
//    ->markAsRisky()
    ->expect(fn($instance) => Linode::instance()->destroy(value($instance)))
    ->status()->toBe(200);

it('shuts down an instance')
    ->tap(fn()=>fakeSaloonRequest(Instance\ShutdownRequest::class))
    ->with('instance-id')
    ->expect(fn($instance) => Linode::instance()->shutdown(value($instance)))
    ->status()->toBe(200);
