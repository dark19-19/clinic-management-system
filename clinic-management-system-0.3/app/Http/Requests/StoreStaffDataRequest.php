<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffDataRequest extends FormRequest
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
            'first_name' => 'string|required|max:20',
            'last_name' => 'string|required|max:20',
            'email' => 'string|email|required|unique:staff,email|exists:users,email',
            'phone' => 'string|required|max:15',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female',
            'address' => 'required|string',
            'work_hours' => 'required|string',
            'specialization' => 'required|string|in:receptionist,cashier,storage_worker,data_manager',
            'license_number' => 'nullable|string|unique:staff,license_number',
            'qualifications' => 'nullable|string'
        ];
    }
}
