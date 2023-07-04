<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockResponse;
use Saloon\Laravel\Facades\Saloon;
use SamuelMwangiW\Linode\Saloon\Requests;
use SamuelMwangiW\Linode\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

function fakeSaloonRequest(string $request): void
{
    $fixtures = [
        Requests\Account\GetRequest::class => 'get/account',
        Requests\Regions\ListRequest::class => 'get/regions',
        Requests\Billing\PlansListRequest::class => 'get/linode/types',
        Requests\Instance\DisksRequest::class => 'get/linode/instances/31293947/disks',
        Requests\Instance\GetRequest::class => 'get/linode/instances/31293947',
        Requests\Instance\ListRequest::class => 'get/linode/instances',
        Requests\Instance\CreateRequest::class => 'post/linode/instances',
        Requests\Instance\UpdateRequest::class => 'put/linode/instances/31293947',
        Requests\Instance\CloneRequest::class => 'post/linode/instances/31293947/clone',
        Requests\Instance\DeleteRequest::class => 'delete/linode/instances/31294599',
        Requests\Instance\ShutdownRequest::class => 'post/linode/instances/31293947/shutdown',
        Requests\Images\CreateRequest::class => 'post/images',
        Requests\Images\ListRequest::class => 'get/images',
        Requests\Images\ShowRequest::class => 'get/images/linode/ubuntu20.04',
        Requests\Firewall\ListRequest::class => 'get/networking/firewalls',
        Requests\Firewall\ShowRequest::class => 'get/networking/firewalls/29666',
        Requests\Firewall\DeleteRequest::class => 'delete/networking/firewalls/29675',
        Requests\Firewall\Rules\ListRequest::class => 'get/networking/firewalls/29666/rules',
    ];

    if (! array_key_exists($request, $fixtures)) {
        throw new RuntimeException("{$request}/fixture mapping is missing");
    }

    Saloon::fake([
        $request => MockResponse::fixture("{$fixtures[$request]}"),
    ]);
}
