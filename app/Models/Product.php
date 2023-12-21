<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;

    protected $fillable = ['brend', 'price', 'category_id', 'measure_id', 'package_type_id', 'amount', 'image'];

    protected $casts =[
        'image'=>'array'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected function measure(): BelongsTo
    {
        return $this->belongsTo(Measure::class);
    }
    protected function package_tye(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    } 

}
