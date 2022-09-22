<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;
use SamuelMwangiW\Linode\Factory\ImageFactory;
use SamuelMwangiW\Linode\Request\Images\CreateRequest;
use SamuelMwangiW\Linode\Request\Images\ListRequest;
use SamuelMwangiW\Linode\Request\Images\ShowRequest;

class Image
{
    public function list(): Collection
    {
        return ListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn (array $image) => ImageFactory::make($image));
    }

    public function create(array $data): DTOContract
    {
        $image = CreateRequest::build()
            ->withData([
                'disk_id' => $data['disk_id'],
                'label' => $data['label'] ?? '',
                'description' => $data['description'] ?? 'Created using Linode SDK',
            ])
            ->fetch()
            ->json();

        return ImageFactory::make($image);
    }

    public function show(string $id): DTOContract
    {
        $image = ShowRequest::build()
            ->setPath("images/$id")
            ->fetch()
            ->json();

        return ImageFactory::make($image);
    }
}
