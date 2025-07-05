<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $fillable = ['patient_id','doctor_id','date','start_time', 'end_time', 'reason', 'notes' ,'status','canceled_at'];
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
    public function approve() {
        $this->update([
            'status' => 'approved'
        ]);
    }
    public function reject() {
        $this->update([
            'status' => 'rejected'
        ]);
    }
    public function cancel() {
        $this->update([
            'status' => 'canceled',
            'canceled_at' => now()
        ]);
    }
    public function complete() {
        $this->update([
            'status' => 'completed'
        ]);
    }
}
