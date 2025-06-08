<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['patient_id','doctor_id','medicines'];
    public function patient() {
        return $this->hasOne(Patient::class);
    }
    public function doctor() {
        return $this->hasOne(Doctor::class);
    }
}
