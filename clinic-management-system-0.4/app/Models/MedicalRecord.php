<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use SoftDeletes;

    protected $fillable = ['patient_id','doctor_id','diagnosis','prescription_id'];
    protected $table = 'medical_record';
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function prescription() {
        return $this->hasOne(Prescription::class);
    }
}
