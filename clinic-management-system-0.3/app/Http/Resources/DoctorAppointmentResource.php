<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->date,
            'status' => $this->status,
            'booked_at' => date_format($this->created_at, 'Y-m-d'),
            'patient_name' => $this->whenLoaded('patient')->user()->name
        ];
    }
}
