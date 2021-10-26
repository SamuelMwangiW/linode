<?php

namespace SamuelMwangiW\Linode\Enum;

class FirewallRule
{
    const ACCEPT = 'ACCEPT';
    const DROP = 'DROP';

    public static function from(string $rule): string
    {
        return $rule === self::ACCEPT ? self::ACCEPT : self::DROP;
    }
}
