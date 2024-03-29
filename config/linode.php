<?php

declare(strict_types=1);

return [
    'endpoint' => env('LINODE_API_ENDPOINT', 'https://api.linode.com/v4/'),
    'token' => env('LINODE_PERSONAL_ACCESS_TOKEN'),
];
