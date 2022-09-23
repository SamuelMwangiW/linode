<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Exceptions\SaloonException;
use Sammyjo20\Saloon\Exceptions\SaloonRequestException;
use Sammyjo20\Saloon\Http\SaloonResponse;
use SamuelMwangiW\Linode\DTO\DiskDTO;
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
    /**
     * @return Collection<InstanceDTO>
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws SaloonException
     */
    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn($data) => InstanceFactory::make($data));
    }

    /**
     * @param string|int $instance
     * @return InstanceDTO
     * @throws SaloonException
     * @throws GuzzleException
     * @throws \ReflectionException
     * @throws SaloonRequestException
     */
    public function show(string|int $instance): InstanceDTO
    {
        $data = GetRequest::make($instance)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param string|int $instance
     * @return Collection<DiskDTO>
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function disks(string|int $instance): Collection
    {
        return DisksRequest::make($instance)
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn(array $disk) => DiskFactory::make($disk));
    }

    /**
     * @param array $instance
     * @return InstanceDTO
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function create(array $instance): InstanceDTO
    {
        $data = CreateRequest::make($instance)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param int $id
     * @param array $instance_details
     * @return InstanceDTO
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function update(int $id, array $instance_details): InstanceDTO
    {
        $data = UpdateRequest::make($id, $instance_details)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param int $id
     * @param array $instance_details
     * @return InstanceDTO
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function clone(int $id, array $instance_details): InstanceDTO
    {
        $data = CloneRequest::make($id, $instance_details)
            ->send()
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param mixed $id
     * @return SaloonResponse
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function destroy(mixed $id): SaloonResponse
    {
        return DeleteRequest::make($id)
            ->send()
            ->throw();
    }

    /**
     * @param mixed $linodeId
     * @return SaloonResponse
     * @throws GuzzleException
     * @throws SaloonException
     * @throws SaloonRequestException
     * @throws \ReflectionException
     */
    public function shutdown(mixed $linodeId): SaloonResponse
    {
        return ShutdownRequest::make($linodeId)
            ->send()
            ->throw();
    }
}
