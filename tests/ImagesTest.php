<?php

use SamuelMwangiW\Linode\DTO\ImageDTO;
use SamuelMwangiW\Linode\Linode;

it("fetches available images")
    ->expect(fn() => Linode::images()->list())
    ->toBeCollection()
    ->first()->toBeInstanceOf(ImageDTO::class);

it("creates an image from a disk")
    ->with('disk')
    ->expect(fn($disk) => Linode::images()->create(value($disk)))
    ->toBeInstanceOf(ImageDTO::class);

it("show an image")
    ->with('image-id')
    ->expect(fn($image) => Linode::images()->show(value($image)))
    ->toBeInstanceOf(ImageDTO::class);
