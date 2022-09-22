<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class FirewallDTO implements DTOContract
{
    public function __construct(
        public int $id,
        public string $label,
        public Carbon $created,
        public Carbon $updated,
        public string $status,
        public FirewallRulesDTO $rules,
        public Collection $tags,
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
            'created' => $this->created,
            'updated' => $this->updated,
            'status' => $this->status,
            'rules' => (array) $this->rules,
        ];
    }
}
