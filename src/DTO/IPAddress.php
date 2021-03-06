<?php

namespace SamuelMwangiW\Linode\DTO;

class IPAddress
{
    public function __construct(
        public string $ip
    ) {
    }

    public function __toString(): string
    {
        return $this->ip;
    }
}
