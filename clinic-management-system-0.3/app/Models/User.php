<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
    public function staff() {
        return $this->hasOne(Staff::class);
    }
    public function pharmacist()
    {
        return $this->hasOne(Pharmacist::class);
    }
    public function appointments() {
        return $this->hasMany(Appointment::class);
    }
    public function medicalRecord() {
        return $this->hasMany(MedicalRecord::class);
    }
    public function userAppointment() {
        return $this->hasOne(UserAppointment::class);
    }

    public function login() {
        $this->update([
            'last_login_at' => now()
        ]);
    }
    public function logout() {
        $session = Session::where('user_id', $this->id)->first();
        $session->delete();
    }

}
