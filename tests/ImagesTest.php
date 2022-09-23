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

it('creates an image from a disk')
    ->tap(fn () => fakeSaloonRequest(Images\CreateRequest::class))
    ->with('disk')
    ->expect(fn ($disk) => Linode::images()->create(value($disk)))
    ->toBeInstanceOf(ImageDTO::class);

it('show an image')
    ->tap(fn () => fakeSaloonRequest(Images\ShowRequest::class))
    ->with('image-id')
    ->expect(fn ($image) => Linode::images()->show(value($image)))
    ->toBeInstanceOf(ImageDTO::class);
