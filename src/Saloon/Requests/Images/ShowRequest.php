<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon\Requests\Images;

use SamuelMwangiW\Linode\Saloon\Requests\AuthenticatedRequest;

class ShowRequest extends AuthenticatedRequest
{
    public function __construct(
        private string|int $imageId
    ) {
    }

    public function defineEndpoint(): string
    {
        return "images/{$this->imageId}";
    }
}
