<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'sku'        => $this->sku,
            'name'       => $this->name,
            'price'      => number_format($this->price, 2, ',', '.'),
            'created_at' => $this->created_at->format('d M, Y H:i'),
            'updated_at' => $this->updated_at->format('d M, Y H:i'),
        ];
    }
}