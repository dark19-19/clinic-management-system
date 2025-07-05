<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDataRequest extends FormRequest
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
            'address' => 'sometimes|string|nullable',
            'medical_history' => 'sometimes|string|nullable',
            'phone' => 'string|sometimes|nullable',
            'insurance_info' => 'string|sometimes|nullable',
            'emergency_contact' => 'string|sometimes|nullable'
        ];
    }
}
