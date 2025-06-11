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
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|max:80',
            'birth_date' => 'nullable|string|date',
            'gender' => 'nullable|string|in:male,female',
            'address' => 'string|nullable',
            'blood_group' => 'nullable|string|max:5',
            'medical_history' => 'nullable|string'
        ];
    }
}
