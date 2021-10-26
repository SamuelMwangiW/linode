<?php

namespace SamuelMwangiW\Linode\Domain;

use SamuelMwangiW\Linode\Factory\FirewallFactory;
use SamuelMwangiW\Linode\Request\Firewall\ListRequest;

class Firewall
{
    public function list()
    {
        return ListRequest::build()
            ->fetch()
            ->collect('data')
            ->map(fn (array $firewall) => FirewallFactory::make($firewall));
    }
}
