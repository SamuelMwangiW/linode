<?php

declare(strict_types=1);

use SamuelMwangiW\Linode\DTO\ImageDTO;
use SamuelMwangiW\Linode\Facades\Linode;
use SamuelMwangiW\Linode\Saloon\Requests\Images;

it('fetches available images')
    ->tap(fn () => fakeSaloonRequest(Images\ListRequest::class))
    ->expect(fn () => Linode::images()->list())
    ->toBeCollection()
    ->first()->toBeInstanceOf(ImageDTO::class);

it('creates an image from a disk',function (array $id){
    fakeSaloonRequest(Images\CreateRequest::class);

    $disk = Linode::images()->create($id);

    expect($disk)->toBeInstanceOf(ImageDTO::class);
})->with('disk');

it('show an image')
    ->tap(fn () => fakeSaloonRequest(Images\ShowRequest::class))
    ->with('image-id')
    ->expect(fn ($image) => Linode::images()->show(value($image)))
    ->toBeInstanceOf(ImageDTO::class);
