<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['phone', 'name', 'birthday', 'male', 'job', 'region_id', 'cashback', 'district_id'];

}