<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'prescription_id' => $this->id,
            'medicines' => $this->medicines,
            'created_at' => date_format($this->created_at,'Y-m-d h-i')
        ];
    }
}
