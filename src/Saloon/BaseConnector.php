<?php

namespace SamuelMwangiW\Linode\Saloon;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;

class BaseConnector extends SaloonConnector
{
    use AcceptsJson;

    public function defineBaseUrl(): string
    {
        return config('linode.endpoint');
    }

    /**
     * @return array<int,string>
     */
    public function defaultHeaders(): array
    {
        return [];
    }

    /**
     * @return array<int,string>
     */
    public function defaultConfig(): array
    {
        return [];
    }
}
