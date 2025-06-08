<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['patient_id','doctor_id','date','status','canceled_at'];
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function doctor() {
        return $this->hasOne(Doctor::class);
    }
}
