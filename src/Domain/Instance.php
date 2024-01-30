<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use Saloon\Http\Response;
use SamuelMwangiW\Linode\DTO\InstanceDTO;
use SamuelMwangiW\Linode\Factory\DiskFactory;
use SamuelMwangiW\Linode\Factory\InstanceFactory;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
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
     * @return Collection
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function list(): Collection
    {
        $request = ListRequest::make();
        $connector = AuthenticatedConnector::make();

        return $connector->send($request)
            ->throw()
            ->collect('data')
            ->map(fn ($data) => InstanceFactory::make($data));
    }

    /**
     * @param string|int $instance
     * @return InstanceDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function show(string|int $instance): InstanceDTO
    {
        $request = GetRequest::make($instance);
        $connector = AuthenticatedConnector::make();

        $data = $connector->send($request)
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param string|int $instance
     * @return Collection
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function disks(string|int $instance): Collection
    {
        $request = DisksRequest::make($instance);
        $connector = AuthenticatedConnector::make();

        return $connector->send($request)
            ->throw()
            ->collect('data')
            ->map(fn (array $disk) => DiskFactory::make($disk));
    }

    /**
     * @param array $instance
     * @return InstanceDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function create(array $instance): InstanceDTO
    {
        $request = CreateRequest::make($instance);
        $connector = AuthenticatedConnector::make();

        $data = $connector->send($request)
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param int $id
     * @param array $instance_details
     * @return InstanceDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function update(int $id, array $instance_details): InstanceDTO
    {
        $request = UpdateRequest::make($id, $instance_details);
        $connector = AuthenticatedConnector::make();

        $data = $connector->send($request)
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param int $id
     * @param array $instance_details
     * @return InstanceDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function clone(int $id, array $instance_details): InstanceDTO
    {
        $request = CloneRequest::make($id, $instance_details);
        $connector = AuthenticatedConnector::make();

        $data = $connector->send($request)
            ->throw()
            ->json();

        return InstanceFactory::make($data);
    }

    /**
     * @param mixed $id
     * @return Response
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function destroy(mixed $id): Response
    {
        $request = DeleteRequest::make($id);
        $connector = AuthenticatedConnector::make();

        return $connector->send($request)->throw();
    }

    /**
     * @param mixed $linodeId
     * @return Response
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function shutdown(mixed $linodeId): Response
    {
        $request = ShutdownRequest::make($linodeId);
        $connector = AuthenticatedConnector::make();

        return $connector->send($request)->throw();
    }
}
