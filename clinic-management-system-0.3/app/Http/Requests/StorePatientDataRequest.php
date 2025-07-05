<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientDataRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|exists:users,email|unique:patients,email',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:patients,phone',
            'emergency_contact' => 'required|string|max:255|unique:patients,emergency_contact',
            'insurance_info' => 'nullable|string|max:255',
            'blood_group' => 'required|string|in:A+,B+,AB+,O+,A-,B-,AB-,O-',
            'medical_history' => 'nullable|string'

        ];
    }
}
