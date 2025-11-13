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
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'brand' => 'sometimes|required|string|max:100',
                'model' => 'sometimes|required|string|max:100',
                'year' => 'sometimes|required|integer|min:1886|max:' . date('Y'),
                'color' => 'sometimes|string|max:50',
                'used' => 'sometimes|boolean',
                'price' => 'sometimes|numeric|min:0',
                'fuel_type' => 'sometimes|in:gasoline,diesel,electric,hybrid',
            ];
        }
        return [
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'used' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'fuel_type' => 'required|in:gasoline,diesel,electric,hybrid',
        ];
    }

    public function messages(): array
    {
        return [
            'fuel_type.in' => 'Fuel type must be only gasoline, diesel, electric or hybrid'
        ];
    }
}

