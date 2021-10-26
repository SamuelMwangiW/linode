<?php

namespace SamuelMwangiW\Linode\DTO;

use Illuminate\Support\Collection;

class RegionDTO implements \SamuelMwangiW\Linode\Contracts\DTOContract
{
    /**
     *     0 => array:5 [
    "id" => "ap-west"
    "country" => "in"
    "capabilities" => array:7 [
    0 => "Linodes"
    1 => "NodeBalancers"
    2 => "Block Storage"
    3 => "GPU Linodes"
    4 => "Kubernetes"
    5 => "Cloud Firewall"
    6 => "Vlans"
    ]
    "status" => "ok"
    "resolvers" => array:2 [
    "ipv4" => "172.105.34.5,172.105.35.5,172.105.36.5,172.105.37.5,172.105.38.5,172.105.39.5,172.105.40.5,172.105.41.5,172.105.42.5,172.105.43.5"
    "ipv6" => "2400:8904::f03c:91ff:fea5:659,2400:8904::f03c:91ff:fea5:9282,2400:8904::f03c:91ff:fea5:b9b3,2400:8904::f03c:91ff:fea5:925a,2400:8904::f03c:91ff:fea5:22cb,2400:8904::f03c:91ff:fea5:227a,2400:8904::f03c:91ff:fea5:924c,2400:8904::f03c:91ff:fea5:f7e2,2400:8904::f03c:91ff:fea5:2205,2400:8904::f03c:91ff:fea5:9207"
    ]
    ]
     */
    public function __construct(
        public string $id,
        public string $country,
        public string $status,
        public Collection $resolvers,
        public Collection $capabilities,
    ) {
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
    }

    public function __toArray(): array
    {
        // TODO: Implement __toArray() method.
    }
}
