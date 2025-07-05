<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'specialization',
        'license_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'address',
        'work_hours',
        'qualifications'
    ];
    protected $table = 'staff';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
