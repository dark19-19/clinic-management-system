<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function book(BookAppointmentRequest $request) {
        $appoinment = AppointmentService::book($request);
        return response()->json([
            'message' => 'Your appointment has been booked, wait until it approved',
            'appointment' => $appoinment
        ],201);
    }
    public function update(UpdateAppointmentRequest $request, int $appointment_id) {
        $array = AppointmentService::update($request, $appointment_id);
        if ($array['status'] == 0) {
            return response()->json([
                'message' => 'Nothing changed, you entered the same data in your appointment',
                'appointment' => $array['appointment']
            ],403);
        } elseif ($array['status'] == 1) {
            return response()->json([
                'message' => 'Your appointment has been updated',
                'appointment' => $array['appointment']
            ]);
        }
    }
    public function cancel(int $appointment_id) {
        AppointmentService::cancel($appointment_id);
    }
    public function approve(int $appointment_id, Request $request) {
        AppointmentService::approve($appointment_id,$request);
        return redirect(route('patient.appointment.index'));
    }
    public function reject(int $appointment_id) {
        AppointmentService::reject($appointment_id);
        return redirect(route('patient.appointment.index'));
    }
    public function destroy(int $appointment_id) {
        AppointmentService::destroy($appointment_id);
        return redirect(route('patient.appointment.index'));
    }

    public function showCenter() {
        $appointments = AppointmentService::index();
        return view('admins.appointments.patients-appointments',[
            'appointments' => $appointments
        ]);
    }
    public function showApprove(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $doctors = Doctor::all();
        return view('admins.appointments.patient-approve', [
            'appointment' => $appointment,
            'doctors' => $doctors
        ]);
    }
}
