<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use SamuelMwangiW\Linode\DTO\InstanceDTO;
use SamuelMwangiW\Linode\Factory\DiskFactory;
use SamuelMwangiW\Linode\Factory\InstanceFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\CloneRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\DeleteRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\DisksRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\GetRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\ShutdownRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Instance\UpdateRequest;

class Instance
{
    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn ($data) => InstanceFactory::make($data));
    }

    public function show(string|int $instance): InstanceDTO
    {
        $data = GetRequest::make($instance)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    public function disks(string|int $instance): Collection
    {
        return DisksRequest::make($instance)
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $disk) => DiskFactory::make($disk));
    }

    public function create(array $instance): InstanceDTO
    {
        $data = CreateRequest::make($instance)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    public function update(int $id, array $instance_details): InstanceDTO
    {
        $data = UpdateRequest::make($id, $instance_details)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    public function clone(int $id, array $instance_details): InstanceDTO
    {
        $data = CloneRequest::make($id, $instance_details)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    public function destroy(mixed $id): SaloonResponse
    {
        return DeleteRequest::make($id)
            ->send()
            ->throw();
    }

    public function shutdown(mixed $linodeId): SaloonResponse
    {
        return ShutdownRequest::make($linodeId)
            ->send()
            ->throw();
    }
}
