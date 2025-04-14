<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storecraftsmen extends FormRequest
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
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imageA' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imageB' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string',
            'governorates_id' => 'required|exists:governorates,id',
            'category_id' => 'required|exists:categories,id',
            'NationalNumber' => ['required', 'digits:14', 'numeric'],
            'city' => 'required|string',
            'startDate'=> 'required|date_format:Y-m-d',
            'endDate'=> 'required|date_format:Y-m-d|after_or_equal:startDate',
        ];
    }
}
