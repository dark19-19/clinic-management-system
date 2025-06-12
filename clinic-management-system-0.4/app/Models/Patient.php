<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','user_id', 'age', 'birth_date', 'gender', 'address', 'blood_group', 'medical_history'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
