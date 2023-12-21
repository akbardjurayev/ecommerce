<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "parent_id"=> $this->parent_id,
            "name"=> $this->name,
            "image"=> $this->image,
            "is_active"=> $this->is_active,
        ];
    }
}
