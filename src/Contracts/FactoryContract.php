<?php

namespace SamuelMwangiW\Linode\Contracts;

interface FactoryContract
{
    public static function make(array $data): DTOContract;
}
