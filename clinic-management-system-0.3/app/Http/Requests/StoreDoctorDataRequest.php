<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorDataRequest extends FormRequest
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
            'specialization' => 'required|string|max:255',
            'license_number' => 'string|required|unique:doctors,license_number|max:255',
            'qualifications' => 'string|nullable',
            'first_name' => 'string|required|max:50',
            'last_name' => 'string|required|max:50',
            'email' => 'required|string|email|exists:users,email|unique:doctors,email',
            'birth_date' => 'required|date',
            'gender' => 'string|required|in:male,female',
            'address' => 'string|required',
            'phone' => 'string|required|max:15|unique:doctors,phone',
            'call_hours' => 'string|required',
            'available_hours' => 'string|required'
        ];
    }
}
