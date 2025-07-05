<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Patient extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'emergency_contact',
        'insurance_info',
        'birth_date',
        'gender',
        'address',
        'phone',
        'blood_group',
        'medical_history'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
    public function medicalRecords() {
        return $this->hasMany(MedicalRecord::class);
    }
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
}
