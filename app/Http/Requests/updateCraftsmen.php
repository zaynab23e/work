<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCraftsmen extends FormRequest
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
            'name'=>'nullable|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imageA' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imageB' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone'=>'nullable|integer',
            'governorates_id'=>'nullable|exists:governorates,id',
            'category_id'=>'nullable|exists:categories,id',
            'NationalNumber'=>'nullable|integer',
            'city'=>'nullable|string',
        ];
    }
}
