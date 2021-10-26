<?php

namespace SamuelMwangiW\Linode\Enum;

class FirewallRule
{
    public const ACCEPT = 'ACCEPT';
    public const DROP = 'DROP';

    public static function from(string $rule): string
    {
        return $rule === self::ACCEPT ? self::ACCEPT : self::DROP;
    }
}
