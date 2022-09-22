<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;
use SamuelMwangiW\Linode\Factory\ImageFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Images\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Images\ShowRequest;

class Image
{
    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $image) => ImageFactory::make($image));
    }

    public function create(array $data): DTOContract
    {
        $image = CreateRequest::make($data)
            ->send()
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }

    public function show(string $id): DTOContract
    {
        $image = ShowRequest::make($id)
            ->send()
            ->throw()
            ->json();

        return ImageFactory::make($image);
    }
}
