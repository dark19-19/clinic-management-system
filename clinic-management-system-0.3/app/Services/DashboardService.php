<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardService extends Service
{
    public static function getPatientsLastWeek()
    {
        $patients = Patient::all();
        $count = 0;
        foreach ($patients as $patient) {
            if ($patient->created_at >= now()->subWeek()) {
                $count++;
            }
        }
        return $count;
    }

    public static function getUsersLastWeek()
    {
        $users = User::all();
        $count = 0;
        foreach ($users as $user) {
            if ($user->created_at >= now()->subWeek()) {
                $count++;
            }
        }
        return $count;
    }

    public static function getUpcomingAppointments()
    {
        $user_id = auth()->id();
        $user = \auth()->user();
        if ($user->role() == 'patient') {
            $patient = Patient::where('user_id', $user_id)->first();
            $appointments = Appointment::where('patient_id', $patient->id)->get();
            $upcoming = [];
            foreach ($appointments as $appointment) {
                if ($appointment->created_at <= now()->addWeek()) {
                    array_push($upcoming, $appointment);
                }
            }
            return $upcoming;
        } elseif ($user->role() == 'patient') {
            $doctor = Doctor::where('user_id', $user_id)->first();
            $appointments = Appointment::where('doctor_id', $doctor->id)->get();
            $upcoming = [];
            foreach ($appointments as $appointment) {
                if($appointment->created_at <= now()->addWeek()) {
                    array_push($upcoming, $appointment);
                }
            }
            return $upcoming;
        }
    }
}
