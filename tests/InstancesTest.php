<?php

use Carbon\Carbon;
use SamuelMwangiW\Linode\{DTO\DiskDTO, DTO\InstanceDTO, DTO\ServerSpecificationDTO, Linode};
use Illuminate\Support\Collection;

it('linode returns a list of instances')
    ->expect(fn() => Linode::instance()->list())
    ->toBeCollection()
    ->first()
    ->hypervisor->toBe('kvm')
    ->first()->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->first()->created->toBeInstanceOf(Carbon::class)
    ->first()->ips->toBeInstanceOf(Collection::class);

it('returns an instance')
    ->with('instance-id')
    ->expect(fn($instance) => Linode::instance()->show($instance))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->ips->toBeInstanceOf(Collection::class);

it('returns an instance disks')
    ->with('instance-id')
    ->expect(fn($instance) => Linode::instance()->disks($instance))
    ->toBeCollection()
    ->first()->toBeInstanceOf(DiskDTO::class);

it('creates an instance')
    ->with('instance')
    ->expect(fn($instance) => Linode::instance()->create(value($instance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('updates an instance')
    ->with('instance-id','instance-update')
    ->expect(fn($instance,$updatedInstance) => Linode::instance()->update(value($instance),value($updatedInstance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('clones an instance')
    ->with('instance-id','instance-clone')
    ->expect(fn($instance,$updatedInstance) => Linode::instance()->clone(value($instance),value($updatedInstance)))
    ->toBeInstanceOf(InstanceDTO::class)
    ->hypervisor->toBe('kvm')
    ->specification->toBeInstanceOf(ServerSpecificationDTO::class)
    ->created->toBeInstanceOf(Carbon::class)
    ->created->isToday()->toBeTrue()
    ->ips->toBeInstanceOf(Collection::class);

it('destroys an instance')
    ->with('delete-instance-id')
    ->markAsRisky()
    ->expect(fn($instance) => Linode::instance()->destroy(value($instance)))
    ->status()->toBe(200);


it('shuts down an instance')
    ->with('instance-id')
    ->skip()
    ->expect(fn($instance) => Linode::instance()->shutdown(value($instance)))
    ->status()->toBe(200);
