<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAppointment extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'doctor_id' ,'date','start_time','end_time','status','reason','notes','canceled_at'];
    protected $table = 'user_appointments';
    public function user() {
        return $this->belongsTo(User::class);
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
