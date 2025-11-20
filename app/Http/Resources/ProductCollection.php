<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request): array
    {
        return [
            'status' => 'success',
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
            'data' => $this->collection->transform(function ($product) {
                return [
                    'id' => $product->id,
                    'sku' => $product->sku,
                    'name' => $product->name,
                    'price' => number_format($product->price, 2, ',', '.'),
                    'created_at' => $product->created_at->format('d M, Y H:i'),
                    'updated_at' => $product->updated_at->format('d M, Y H:i'),
                ];
            }),
        ];
    }
}