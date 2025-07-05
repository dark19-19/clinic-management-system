<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicalRecordRequest extends FormRequest
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
            'patient_email' => 'string|email|required|max:50|exists:patients,email',
            'appointment_id' => 'integer|exists:appointments,id',
            'diagnosis' => 'string|required',
            'treatment' => 'string|required',
            'notes' => 'string|required',
            'follow_up_date' => 'date|nullable'
        ];
    }
}
