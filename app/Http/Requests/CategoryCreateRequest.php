<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'parent_id'=>'nullable|exists:categories,id',
            'name'=>'required|unique:categories,name',
            'image'=>'required|image|max:2048',
            'is_active'=>'nullable|boolean'
        ];
    }

    public function messages(){
        return[
            'parent_id.exists'=>'parent_id not exists',
            'name.required'=>'Name is required',
            'name.unique'=>'Name must be unique',
            'image.required'=>'Image is required',
            'image.image'=>'Image file must be image',
            'image.max'=>'Image file size must be 2048',
            'image.file'=>'Image must be file',
            'is_active.boolean'=>'is_active value must be boolean',
        ];
    }
}
