<?php

namespace SamuelMwangiW\Linode\DTO;

use SamuelMwangiW\Linode\Contracts\DTOContract;

class PlanDTO implements DTOContract
{
    public function __construct(
        public string                 $id,
        public string                 $label,
        public string                 $hourly_price,
        public string                 $monthly_price,
        public ServerSpecificationDTO $serverSpec,
        public string                 $class,
        public ?string                $successor,
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
            'serverSpec' => (array)$this->serverSpec,
            'class' => $this->class,
            'successor' => $this->successor,
        ];
    }
}
