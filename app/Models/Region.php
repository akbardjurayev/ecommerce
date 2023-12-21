<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'order', 'soato'];

    protected $casts = [
        'name' => 'json',
    ];

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
