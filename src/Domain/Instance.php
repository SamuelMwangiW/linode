<?php

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\DTO\InstanceDTO;
use SamuelMwangiW\Linode\Factory\DiskFactory;
use SamuelMwangiW\Linode\Factory\InstanceFactory;
use SamuelMwangiW\Linode\Request\Instance\CloneRequest;
use SamuelMwangiW\Linode\Request\Instance\CreateRequest;
use SamuelMwangiW\Linode\Request\Instance\DeleteRequest;
use SamuelMwangiW\Linode\Request\Instance\GetRequest;
use SamuelMwangiW\Linode\Request\Instance\ListRequest;
use SamuelMwangiW\Linode\Request\Instance\UpdateRequest;

class Instance
{
    public function list(): Collection
    {
        return ListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn ($data) => InstanceFactory::make($data));
    }

    public function show($instance): InstanceDTO
    {
        $data = GetRequest::build()
            ->setPath("linode/instances/$instance")
            ->fetch()
            ->json();

        return InstanceFactory::make($data);
    }

    public function disks($instance): Collection
    {
        return GetRequest::build()
            ->setPath("linode/instances/$instance/disks")
            ->fetch()
            ->collect('data')
            ->map(fn (array $disk) => DiskFactory::make($disk));
    }

    public function create($instance): InstanceDTO
    {
        $data = CreateRequest::build()
            ->withData($instance)
            ->fetch()
            ->json();

        return InstanceFactory::make($data);
    }

    public function update(int $id, array $instance_details): InstanceDTO
    {
        $data = UpdateRequest::build()
            ->setPath("linode/instances/$id")
            ->withData($instance_details)
            ->fetch()
            ->json();

        return InstanceFactory::make($data);
    }

    public function clone(int $id, array $instance_details): InstanceDTO
    {
        $data = CloneRequest::build()
            ->setPath("linode/instances/$id/clone")
            ->withData($instance_details)
            ->fetch()
            ->json();

        return InstanceFactory::make($data);
    }

    public function destroy(mixed $id): Response
    {
        return DeleteRequest::build()
            ->setPath("linode/instances/$id")
            ->fetch();
    }

    public function shutdown(mixed $value)
    {
    }
}
