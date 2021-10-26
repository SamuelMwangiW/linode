<?php
namespace SamuelMwangiW\Linode\Contracts;

interface DTOContract
{
    public function __toString() :string;

    public function __toArray() : array;
}
