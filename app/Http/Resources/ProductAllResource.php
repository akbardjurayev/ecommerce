<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAllResource extends JsonResource
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
            'brend'=>$this->brend,
            'price'=>$this->price,
            'image'=>$this->image,
            'category'=>new CategoryCreateResource($this->category),
            'measure'=>new MeasureCreateResource($this->measure),
            'package_type'=>new PackageCreateResource($this->package_type),
            'amount'=>$this->amount,
        ];
    }
}
