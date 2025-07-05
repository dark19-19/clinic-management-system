<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacist extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'license_number',
        'email',
        'birth_date',
        'gender',
        'address',
        'work_hours',
        'phone'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
