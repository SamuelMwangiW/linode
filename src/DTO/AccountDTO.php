<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class AccountDTO implements DTOContract
{
    public function __construct(
        public string $uid,
        public string $company,
        public string $email,
        public string $first_name,
        public string $last_name,
        public string $address_1,
        public string $address_2,
        public string $city,
        public string $state,
        public string $zip,
        public string $country,
        public string $phone,
        public float $balance,
        public float $uninvoiced,
        public Carbon $active_since,
    ) {
    }

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'uid' => $this->uid,
            'company' => $this->company,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country,
            'phone' => $this->phone,
            'balance' => $this->balance,
            'uninvoiced' => $this->uninvoiced,
            'active_since' => $this->active_since,
        ];
    }
}
