<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'product'    => [
                'id'   => $this->product->id ?? null,
                'name' => $this->product->name ?? null,
            ],
            'quantity'   => $this->quantity,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => optional($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}