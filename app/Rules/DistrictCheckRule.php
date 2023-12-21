<?php

namespace App\Rules;

use App\Models\District;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DistrictCheckRule implements ValidationRule
{
    public function __construct(public int $region_id){}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!District::where('region_id', $this->region_id)->find($value))
        {
            $fail('Discrict not found in this region!');
        }
    }
}
