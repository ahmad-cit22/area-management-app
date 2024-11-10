<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => 'required|unique:cities,name,NULL,id,state_id,' . $this->state_id,
            'state_id' => 'required|exists:states,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'City name is required',
            'name.unique' => 'There is already a city within the same state',
            'state_id.required' => 'Please select a state',
            'state_id.exists' => 'Please select a valid state'
        ];
    }
}
