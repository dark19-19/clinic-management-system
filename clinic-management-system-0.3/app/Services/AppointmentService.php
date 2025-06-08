<?php

namespace App\Services;

use App\Http\Requests\BookAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class AppointmentService extends Service
{
    public static function book(BookAppointmentRequest $request) {
        $validatedData = $request->validated();
        $user_id =  Auth::user()->id;
        $patient_id = Patient::where('user_id',$user_id)->firstOrFail()->id;
        $appointment = Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $validatedData['doctor_id'],
            'date' => $validatedData['date']
        ]);
        return $appointment;
    }
    public static function update(UpdateAppointmentRequest $request, int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $validatedData = $request->validated();
        if($appointment->doctor_id == $validatedData['doctor_id'] && $appointment->date == $validatedData['date']) {
            return [
                'status' => 0,
                'appointment' => $appointment
            ];
        }
        $appointment->update([
            'doctor_id' => $validatedData['doctor_id'],
            'date' => $validatedData['date']
        ]);
        return [
            'status' => 1,
            'appointment' => $appointment
        ];
    }
    public static function cancel(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->update([
            'status' => 'canceled',
            'canceled_at' => now()
        ]);
    }
    public static function approve(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->update([
            'status' => 'approved'
        ]);
        return $appointment;
    }
    public static function reject(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->update([
            'status' => 'rejected'
        ]);
        return $appointment;
    }
    public static function index() {
        return Appointment::all();
    }
    public static function show(int $appointment_id) {
        return Appointment::findOrFail($appointment_id);
    }
    public static function showPatientAppointments() {
        $patient_id = Auth::user()->patient()->id;
        return Appointment::where('patient_id',$patient_id)->get();
    }
    public static function admin_showPatientAppointments(int $patient_id) {
        return Appointment::where('patient_id',$patient_id)->get();
    }
}
