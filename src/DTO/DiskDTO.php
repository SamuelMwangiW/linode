<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;
use SamuelMwangiW\Linode\Contracts\DTOContract;

class DiskDTO implements DTOContract
{
    public function __construct(
        public int $id,
        public string $status,
        public string $label,
        public Carbon $created,
        public Carbon $updated,
        public string $filesystem,
        public int $size,
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
            'status' => $this->status,
            'label' => $this->label,
            'created' => $this->created,
            'updated' => $this->updated,
            'filesystem' => $this->filesystem,
            'size' => $this->size,
        ];
    }
}
