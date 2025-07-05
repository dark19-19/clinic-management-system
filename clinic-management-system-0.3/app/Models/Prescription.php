<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use SoftDeletes;
    protected $fillable = ['medical_record_id','medicine_id','dosage','frequency','duration','instructions'];
    public function medicalRecord() {
        return $this->belongsTo(MedicalRecord::class);
    }
    public function medicine() {
        return $this->belongsTo(Medicine::class);
    }
}
