<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'phone'=>$this->phone,
            'name'=>$this->name,
            'birthday'=>$this->birthday,
            'male'=>$this->male,
            'region'=>$this->region_id,
            'district'=>$this->district_id,
        ];
    }
}
