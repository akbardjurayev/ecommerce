<?php

namespace App\Filters;

class CategoryFilter extends BaseFilter
{

    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
}