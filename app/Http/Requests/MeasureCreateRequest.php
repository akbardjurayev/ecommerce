<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeasureCreateRequest extends FormRequest
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
            'name'=>'required|unique:measures,name|max:100',
            'unit'=>'required|max:100',
            'is_active'=>'nullable|boolean',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Name is required',
            'name.unique'=>'Name must be unique',
            'unit.required'=>'Name is required',
            'unit.max'=>'unit\'s max lenth must be 100 charracter',
            'is_active.boolean'=>'is_active parametr must be boolean'
        ];
    }

}
