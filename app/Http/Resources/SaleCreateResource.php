<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductCreateResource;

class SaleCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'amount'=>$this->amount,
            'product_id'=>new ProductCreateResource($this->product),
            'partition_id'=>$this->partition,
            'delivery'=>$this->delivery,
        ];
    }
}
