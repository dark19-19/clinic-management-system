<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorPrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'medicines' => $this->medicines,
            'created_at' => date_format($this->created_at,'Y-m-d h:i'),
            'patient_name' => $this->whenLoaded('patient')->user()->name
        ];
    }
}
