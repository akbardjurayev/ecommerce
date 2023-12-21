<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Region;
use App\Models\District;


class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'payment_type', 'partition_id', 'delivery', 'product_id', 'cashback', 'user_id'];

    protected $casts = [
        'delivery'=>'array'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function partition(): BelongsTo
    {
        return $this->belongsTo(Partition::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
