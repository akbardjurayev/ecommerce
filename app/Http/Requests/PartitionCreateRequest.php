<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartitionCreateRequest extends FormRequest
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
            'product_id'=>'required|exists:products,id',
            'amount'=>'required|integer|max:1000000000',
            'price'=>'required|integer'
        ];
    }
    public function messages(){
        return [
            'product_id.required'=>'porduct_id is required',
            'product_id.exists'=>'porduct_id is not exists',
            'amount.required'=>'amount is required',
            'amount.integer'=>'amount must be integer',
            'amount.max'=>'amount max lenth is 10 character',
            'price.required'=>'price is required',
            'price.integer'=>'price must be integer'
        ];
    }
}
