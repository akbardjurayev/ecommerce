<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'parent_id'=>$this->parent_id,
            'name'=>$this->name,
            'image'=>asset('storage/'.$this->image),
            'is_active'=>$this->is_active,
        ];
    }
}


// order address
[
    [
    'order'=>[
        'product_id'=>123,
        'amount'=>123,
        'discount'=>[
            'status'=>true,
            'protsent'=>20
            ],
        'total_price'=>123123,
        'discount_price'=>12345
        ],
    'delivery'=>[
            'address'=>'text',
            'description'=>'text',
            'payment_type'=>[
                    'cash'=>true,
                    'online'=>false,
                    'terminal'=>true
                ],
            'delivery'=>[
                    'courier'=>true,
                    'my_self'=>false
                ],
            'delivery_payment'=>123456,
            'use_keshback'=>[
                    'agreement'=>true,
                    'keshbek_amount'=>123
                ]
        ]
    ]

];

// product create