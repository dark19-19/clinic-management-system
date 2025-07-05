<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['patient_id','appointment_id','amount','payment_method','status','transaction_id','notes'];
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function appointment() {
        return $this->belongsTo(Appointment::class);
    }
}
