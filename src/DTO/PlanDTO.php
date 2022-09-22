<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use SamuelMwangiW\Linode\Contracts\DTOContract;

class PlanDTO implements DTOContract
{
    public function __construct(
        public string $id,
        public string $label,
        public float $hourly_price,
        public float $monthly_price,
        public ServerSpecificationDTO $serverSpec,
        public string $class,
        public ?string $successor,
    ) {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function __toArray(): array
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
            'hourly_price' => $this->hourly_price,
            'monthly_price' => $this->monthly_price,
            'serverSpec' => (array) $this->serverSpec,
            'class' => $this->class,
            'successor' => $this->successor,
        ];
    }
}
