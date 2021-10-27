<?php

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;
use SamuelMwangiW\Linode\DTO\FirewallDTO;
use SamuelMwangiW\Linode\Factory\FirewallFactory;
use SamuelMwangiW\Linode\Request\Firewall\CreateRequest;
use SamuelMwangiW\Linode\Request\Firewall\DeleteRequest;
use SamuelMwangiW\Linode\Request\Firewall\ListRequest;
use SamuelMwangiW\Linode\Request\Firewall\ShowRequest;

class Firewall
{
    #[Pure]
    public function rules(): FirewallRule
    {
        return new FirewallRule();
    }

    public function list(): Collection
    {
        return ListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn (array $firewall) => FirewallFactory::make($firewall));
    }

    public function show($firewallId): FirewallDTO
    {
        return FirewallFactory::make(
            data: ShowRequest::build()
                ->setPath("networking/firewalls/{$firewallId}")
                ->fetch()
                ->json()
        );
    }

    public function create($data)
    {
        CreateRequest::build()
            ->withData($data)
            ->fetch()->collect()->dd();
    }

    public function destroy($firewallId): Response
    {
        return DeleteRequest::build()
            ->setPath("networking/firewalls/{$firewallId}")
            ->fetch();
    }
}
