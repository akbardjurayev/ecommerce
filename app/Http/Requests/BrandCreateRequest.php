<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|unique:brends,name|max:200',
            'logo'=>'nullable|image|max:2048',
            'is_active'=>'nullable|boolean'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Name is required',
            'name.unique'=>'Name must be unique',
            'name.max'=>'Name\'s max lenth is 200 character',
            'is_active.boolean'=>'is_active must be boolean',
            'logo.file'=>'logo must be file',
            'logo.image'=>'logo file must be image',
            'logo.max'=>'logo file size will be 2048 kilobyte',
        ];
    }

}
