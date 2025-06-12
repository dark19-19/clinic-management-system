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
            'patient_id' => 'integer|required|exists:patients,id',
            'doctor_id' => 'integer|required|exists:doctors,id',
            'diagnosis' => 'string|required',
            'prescription_id' => 'integer|required|exists:prescriptions,id|unique:medical_records,prescription_id'
        ];
    }
}
