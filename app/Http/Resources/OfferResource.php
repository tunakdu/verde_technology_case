<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'offerSku' => $this->offerSku,
            'productSku' => $this->productSku,
            'sellerSku' => $this->sellerSku,
            'price' => $this->price,
            'condition' => $this->condition,
            'availability' => $this->availability
        ];
    }
}
