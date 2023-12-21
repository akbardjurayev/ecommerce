<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\DistrictCheckRule;


class SaleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // '*.product_id'=>'required|integer|exists:products,id',
            '*.order.*.partition_id'=>'nullable|integer|exists:partitions,id',
            '*.order.*.amount'=>'required|integer|max:1000000000|min:1',
            '*.cashback'=>'nullable|integer',
            '*.delivery'=>'nullable',
            '*.user_id'=>'required|exists:users,id|max:10',
            '*.delivery.district_id'=>[
                'exists:districts,id',
                'max:10',
                new DistrictCheckRule($this->region_id)
            ],
            '*.delivery.location'=>'nullable',
            '*.delivery.location.latitude'=>'nullable|numeric',
            '*.delivery.location.longitude'=>'nullable|numeric',
        ];
    }

    public function messages(){
        return[
            // '*.product_id.required'=>'product_id is required',
            // '*.product_id.integer'=>'product_id type must be integer',
            // '*.product_id.exists'=>'product_id is not exist',
            '*.partition_id.exists'=>'product_id is not exist',
            '*.partition_id.integer'=>'product_id must be integer',
            '*.amount.required'=>'amount is required',
            '*.amount.integer'=>'amount must be integer',
            '*.amount.max'=>'amount max lenth is 1000000000',
            '*.amount.min'=>'amount min lenth is 1',
            '*.cashback.integer'=>'cashback must be integer',
            'user_id.required'=>'user_id is required',
            '*.user_id.exists'=>'user_id is not exists',
            '*.user_id.max'=>'user_id max lenth is 10 character',
            '*.region_id.exists'=>'region_id is not exists',
            '*.region_id.max'=>'region_id max lenth is 10 character',
            '*.district_id.exists'=>'district_id is not exists',
            '*.region_id.max'=>'district_id max lenth is 10 character',
            '*.delivery.location.latitude.numeric'=>'latitude must be numeric',
            '*.delivery.location.longitude.numeric'=>'longitude must be numeric',

        ];
    }


}
