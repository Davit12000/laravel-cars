<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'brand'      => $this->brand,
            'model'      => $this->model,
            'year'       => $this->year,
            'color'      => $this->color,
            'used'       => (bool) $this->used,
            'price'      => $this->price,
            'fuel_type'  => $this->fuel_type,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
