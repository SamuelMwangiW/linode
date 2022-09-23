<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;
use SamuelMwangiW\Linode\DTO\ImageDTO;
use SamuelMwangiW\Linode\Factory\ImageFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Images\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ShowRequest;

class Image
{
    /**
     * @return Collection<ImageDTO>
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $image) => ImageFactory::make($image));
    }

    /**
     * @param array $data
     * @return ImageDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public function create(array $data): ImageDTO
    {
        $image = CreateRequest::make($data)
            ->send()
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }

    /**
     * @param string $id
     * @return ImageDTO
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ReflectionException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonException
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonRequestException
     */
    public function show(string $id): ImageDTO
    {
        $image = ShowRequest::make($id)
            ->send()
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }
}
