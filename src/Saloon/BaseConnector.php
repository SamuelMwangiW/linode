<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Saloon;

use Saloon\Http\Connector;

class BaseConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('linode.endpoint');
    }

    /**
     * @return array<string,mixed>
     */
    public function defaultHeaders(): array
    {
        return [];
    }

    /**
     * @return array<string,mixed>
     */
    public function defaultConfig(): array
    {
        return [];
    }
}
