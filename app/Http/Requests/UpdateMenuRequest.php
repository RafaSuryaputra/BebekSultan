<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:users,name',
            'price' => 'required|integer',
            'tags' => 'required|string',            
            'category' => 'required|string',
            'description' => 'required|string',            
            'image' => 'nullable|mimes:png,jpg,jpeg,svg',
        ];
    }
}
