<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseFilter
{
    public function __construct(public Builder $builder, public Request $request)
    {
    }

    public function apply()
    {
        foreach($this->request->all() as $key => $value)
        {
            if(method_exists($this, $key))
            {
                $this->$key($value);
            }
        }

        return $this->builder;
    }
}