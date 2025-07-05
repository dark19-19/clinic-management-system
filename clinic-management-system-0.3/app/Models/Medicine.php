<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description','stock','category','price','manufacturer'];
    public function prescriptions() {
        return $this->hasMany(Prescription::class);
    }
}
