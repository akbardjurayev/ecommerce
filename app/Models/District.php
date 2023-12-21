<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'region_id',
        'name',
        'order',
        'soato',
    ];

    protected $casts = [
        'name' => 'json',
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
