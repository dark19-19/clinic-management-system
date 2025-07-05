<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAppointmentRequest;
use App\Models\Doctor;
use App\Models\UserAppointment;
use App\Services\UserAppointmentService;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller
{
    public function store(StoreUserAppointmentRequest $request) {
        $userAppointment = UserAppointmentService::store($request);
        return redirect()->intended(route('user.home'));
    }

    public function showCenter() {
        return view('admins.appointments.users-appointments', [
            'appointments' => UserAppointmentService::index()
        ]);
    }
    public function showApprove(int $appointment_id) {
        $appointment = UserAppointment::findOrFail($appointment_id);
        $doctors = Doctor::all();
        return view('admins.appointments.user-approve' , [
            'appointment' => $appointment,
            'doctors' => $doctors
        ]);
    }
    public function approve(int $appointment_id, Request $request) {
        UserAppointmentService::approve($appointment_id, $request);
        return redirect(route('user.appointment.index'));
    }
    public function reject(int $appointment_id)
    {
        UserAppointmentService::reject($appointment_id);
        return redirect(route('user.appointment.index'));
    }
    public function cancel(int $appointment_id)
    {
        UserAppointmentService::cancel($appointment_id);
        return redirect(route('user.home'));
    }
    public function destroy(int $appointment_id) {
        UserAppointmentService::destroy($appointment_id);
        return redirect(route('user.appointment.index'));
    }
}
