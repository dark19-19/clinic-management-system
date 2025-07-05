<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use SoftDeletes;

    protected $fillable = ['patient_id','doctor_id','appointment_id' ,'treatment','diagnosis','notes', 'follow_up_date'];
    protected $table = 'medical_records';
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
