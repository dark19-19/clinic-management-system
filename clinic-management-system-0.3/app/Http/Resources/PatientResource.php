<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'age' => $this->age,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'address' => $this->address,
            'blood_group' => $this->blood_group,
            'medical_history' => $this->medical_hsitory,
            'patient_data_upadted_at' => date_format($this->updated_at, 'Y-m-d')
        ];
    }
}
