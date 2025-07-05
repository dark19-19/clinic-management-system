<?php

namespace App\Services;

use App\Http\Requests\BookAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Log;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentService extends Service
{
    public static function book(BookAppointmentRequest $request) {
        $validatedData = $request->validated();
        $user_id =  auth()->user()->id;
        $patient_id = Patient::where('user_id',$user_id)->firstOrFail()->id;
        $appointment = Appointment::create([
            'patient_id' => $patient_id,
            'doctor_id' => $validatedData['doctor_id'],
            'date' => $validatedData['date']
        ]);
        return $appointment;
    }
    public static function cancel(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->cancel();
    }
    public static function approve(int $appointment_id, Request $request) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->update([
            'doctor_id' => $request->doctor_id
        ]);
        $appointment->approve();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'approved a patient appointment');
    }
    public static function reject(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->reject();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'rejected a patient appointment');
    }
    public static function destroy(int $appointment_id) {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->delete();
    }
    public static function index() {
        return Appointment::all();
    }
}
