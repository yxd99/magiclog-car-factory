<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
			'brand' => 'required|string|max:30',
			'model' => 'required|string',
			'color' => 'required|string|max:50',
            'year' => 'required|integer|gte:1900|lte:3000',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
        ];
    }
}
