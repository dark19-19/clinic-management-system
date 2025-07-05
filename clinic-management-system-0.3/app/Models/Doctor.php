<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'doc_id',
        'specialization',
        'license_number',
        'qualifications',
        'call_hours',
        'available_hours',
        'first_name',
        'last_name',
        'email',
        'gender',
        'address',
        'birth_date',
        'phone'
        ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
}
