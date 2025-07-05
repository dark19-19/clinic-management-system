<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'appointment_id' => 'integer|required|exists:appointments,id',
            'amount' => 'decimal:2|required',
            'payment_method' => 'string|required',
            'transaction_id' => 'string|nullable',
            'notes' => 'string|nullable'
        ];
    }
}
