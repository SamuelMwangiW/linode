<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\Domain;

use Illuminate\Support\Collection;
use Saloon\Contracts\Response;
use SamuelMwangiW\Linode\DTO\FirewallDTO;
use SamuelMwangiW\Linode\Factory\FirewallFactory;
use SamuelMwangiW\Linode\Saloon\AuthenticatedConnector;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\CreateRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\DeleteRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\ListRequest;
use SamuelMwangiW\Linode\Saloon\Requests\Firewall\ShowRequest;

class Firewall
{
    /**
     * @return FirewallRule
     */
    public function rules(): FirewallRule
    {
        return new FirewallRule();
    }

    /**
     * @return Collection<FirewallDTO>
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function list(): Collection
    {
        $request = ListRequest::make();

        return AuthenticatedConnector::make()
            ->send($request)
            ->throw()
            ->collect('data')
            ->map(fn (array $firewall) => FirewallFactory::make($firewall));
    }

    /**
     * @param $firewallId
     * @return FirewallDTO
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function show($firewallId): FirewallDTO
    {
        $request = ShowRequest::make($firewallId);

        return FirewallFactory::make(
            data: AuthenticatedConnector::make()
                ->send($request)
                ->throw()
                ->json()
        );
    }

    /**
     * @param array $data
     * @return Collection
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function create(array $data): Collection
    {
        $request = CreateRequest::make($data);

        return AuthenticatedConnector::make()
            ->send($request)
            ->throw()
            ->collect();
    }

    /**
     * @param $firewallId
     * @return Response
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function destroy($firewallId): Response
    {
        $request = DeleteRequest::make($firewallId);

        return AuthenticatedConnector::make()
            ->send($request)
            ->throw();
    }
}
