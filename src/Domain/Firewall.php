<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use Sammyjo20\Saloon\Http\SaloonResponse;
use SamuelMwangiW\Linode\DTO\FirewallDTO;
use SamuelMwangiW\Linode\Factory\FirewallFactory;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\DeleteRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\ShowRequest;

class Firewall
{
    public function rules(): FirewallRule
    {
        return new FirewallRule();
    }

    public function list(): Collection
    {
        return ListRequest::make()
            ->send()
            ->throw()
            ->collect('data')
            ->map(fn (array $firewall) => FirewallFactory::make($firewall));
    }

    public function show($firewallId): FirewallDTO
    {
        return FirewallFactory::make(
            data: ShowRequest::make($firewallId)
                ->send()
                ->throw()
                ->json()
        );
    }

    public function create($data)
    {
        CreateRequest::make($data)
            ->send()
            ->throw()
            ->collect()->dd();
    }

    public function destroy($firewallId): SaloonResponse
    {
        return DeleteRequest::make($firewallId)
            ->send()
            ->throw();
    }
}
