<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'brend'=>'required|unique:brends,name',
            '*.image.image'=>'nullable|image',
            'category_id'=>'required|exists:categories,id',
            'measure_id'=>'required|exists:measures,id',
            'package_type_id'=>'required|exists:packages,id'
        ];
    }

    public function messages(){
        return [
            'brend.required'=>'Brend is required',
            'brend.unique'=>'Brend unique',
            'category_id.required'=>'Category is required',
            'category_id.exists'=>'Category_id is not exists',
            'measure_id.required'=>'measure_id is required',
            'measure_id.exists'=>'measure_id is not exists',
            'package_type_id.required'=>'package_type_id is required',
            'package_type_id.exists'=>'package_type_id is not exists'
        ];
    }
}
