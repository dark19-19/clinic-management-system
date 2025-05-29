<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'doctor_id' => $this->doc_id,
            'user_id' => $this->user_id,
            'specilization' => $this->specilization,
            'license_number' => $this->license_number,
            'qualifications' => $this->qualifications,
            'data_stored_at' => date_format($this->updated_at, 'Y-m-d')
        ];
    }
}
