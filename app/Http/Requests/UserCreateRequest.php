<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'phone'=>'required|unique:users,phone|regex:/^998([378]{2}|(9[013-57-9]))\d{7}$/',
            'name'=>'required|max:50',
            'birthday'=>'required|date',
            'region_id'=>'required|exists:regions,id',
            'district_id'=>'required|exists:districts,id',
        ];
    }
    public function messages(){
        return [
            'phone.required'=>'phone is required',
            'phone.unique'=>'Phone must be unique',
            'phone.regex'=>'Phone isn\'t valid',
            'name.required'=>'name is required',
            'name.max'=>'name\'s max lenth is 50',
            'birthday.required'=>'birthday is required',
            'birthday.date'=>'birthday is must be date type (yyyy-mm-dd)',
            'region_id.required'=>'region is required',
            'region_id.exists'=>'region isn\'t exists',
            'district_id.required'=>'district is required',
            'district_id.exists'=>'district isn\'t exists',
        ];
    }

}
