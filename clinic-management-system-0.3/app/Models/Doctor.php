<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['user_id', 'doc_id', 'specilization', 'license_number', 'qualifications'];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
