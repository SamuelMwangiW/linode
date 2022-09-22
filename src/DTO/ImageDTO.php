<?php

declare(strict_types=1);

namespace SamuelMwangiW\Linode\DTO;

use Carbon\Carbon;

class ImageDTO implements \SamuelMwangiW\Linode\Contracts\DTOContract
{
    public function __construct(
        public string $id,
        public string $label,
        public bool $deprecated,
        public int $size,
        public Carbon $created,
        public Carbon $updated,
        public string $type,
        public bool $is_public,
        public ?string $created_by,
        public ?string $vendor,
        public ?string $expiry,
        public Carbon $eol,
        public ?string $status,
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
            'deprecated' => $this->deprecated,
            'size' => $this->size,
            'created' => $this->created,
            'updated' => $this->updated,
            'created_by' => $this->created_by,
            'type' => $this->type,
            'is_public' => $this->is_public,
            'vendor' => $this->vendor,
            'expiry' => $this->expiry,
            'eol' => $this->eol,
            'status' => $this->status,
        ];
    }

    public function isPublic(): string
    {
        return $this->is_public ? 'Yes' : 'No';
    }
}
