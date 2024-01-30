<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\DTO\ImageDTO;
use SamuelMwangiW\Linode\Factory\ImageFactory;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Images\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ShowRequest;

class Image
{
    /**
     * @return Collection<ImageDTO>
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
            ->map(fn (array $image) => ImageFactory::make($image));
    }

    /**
     * @param array $data
     * @return ImageDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function create(array $data): ImageDTO
    {
        $request = CreateRequest::make($data);
        $connector = AuthenticatedConnector::make();

        $image = $connector->send($request)
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }

    /**
     * @param string $id
     * @return ImageDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function show(string $id): ImageDTO
    {
        $request = ShowRequest::make($id);
        $connector = AuthenticatedConnector::make();

        $image = $connector->send($request)
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }
}
