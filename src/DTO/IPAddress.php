<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use SamuelMwangiW\Linode\Support\IpUtils;

class IPAddress
{
    public string $ip;

    protected array $v4 = [
        '0.0.0.0/8',
        '10.0.0.0/8',
        '127.0.0.0/8',
        '172.16.0.0/12',
        '192.168.0.0/16',
        '169.254.0.0/16',
    ];

    protected array $v6 = [
        '::1/128',
        'fc00::/7',
        'fd00::/8',
        'fe80::/10',
    ];

    public function __construct(
        string $ip
    ) {
        if (! filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException('Invalid IP received');
        }

        $this->ip = $ip;
    }

    public function isV4(): bool
    {
        return ! $this->isV6();
    }

    public function isV6(): bool
    {
        return substr_count($this->ip, ':') > 1;
    }

    public function isPrivate(): bool
    {
        $ips = $this->isV4() ? $this->v4 : $this->v6;

        return IpUtils::checkIp($this->ip, $ips);
    }

    public function isPublic(): bool
    {
        return ! $this->isPrivate();
    }

    public function __toString(): string
    {
        return $this->ip;
    }
}
