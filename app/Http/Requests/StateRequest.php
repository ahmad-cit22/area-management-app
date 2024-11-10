<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
            'name' => 'required',
            'country_id' => 'required|exists:countries,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'State name is required',
            'country_id.required' => 'Please select a country',
            'country_id.exists' => 'Please select a valid country'
        ];
    }
}
