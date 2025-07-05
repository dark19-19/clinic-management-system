<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Payment;
use App\Models\User;
use App\Services\DashboardService;
use App\Services\PatientService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminIndex() {
        $patientCount = DashboardService::getPatientsLastWeek();
        $doctorsCount = Doctor::count();
        $usersCount = DashboardService::getUsersLastWeek();
        $paymentsCount = Payment::count();

        return view('admins.dashboard',[
            'patientsCount' => $patientCount,
            'doctorsCount' => $doctorsCount,
            'usersCount' => $usersCount,
            'paymentsCount' => $paymentsCount
        ]);
    }
    public function showUsers() {
        $users = User::all();
        return view('admins.users.index', [
            'users' => $users
        ]);
    }
}
