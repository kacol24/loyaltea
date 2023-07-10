<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginatorInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'count'        => $this->count(),
            'currentPage'  => $this->currentPage(),
            'firstItem'    => $this->firstItem(),
            'hasMorePages' => $this->hasMorePages(),
            'lastItem'     => $this->lastItem(),
            'lastPage'     => $this->lastPage(),
            'perPage'      => $this->perPage(),
            'total'        => $this->total(),
        ];
    }
}
