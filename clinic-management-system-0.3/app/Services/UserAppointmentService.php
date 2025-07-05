<?php

namespace App\Services;

use App\Http\Requests\StoreUserAppointmentRequest;
use App\Models\Log;
use App\Models\UserAppointment;
use Illuminate\Http\Request;

class UserAppointmentService extends Service
{
    public static function store(StoreUserAppointmentRequest $request) {
        $user_id = auth()->id();
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user_id;
        UserAppointment::create($validatedData);
        return UserAppointment::where('user_id', $user_id)->first();

    }
    public static function index() {
        return UserAppointment::with('user')->get();
    }

    public static function approve(int $appointment_id, Request $request) {
        $appointment = UserAppointment::findOrFail($appointment_id);
        $appointment->update([
            'doctor_id' => $request->doctor_id
        ]);
        $appointment->approve();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'approved a user appointment');
    }
    public static function reject(int $appointment_id) {
        $appointment = UserAppointment::findOrFail($appointment_id);
        $appointment->reject();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'rejected a user appointment');
    }
    public static function cancel(int $appointment_id) {
        $appointment = UserAppointment::findOrFail($appointment_id);
        $appointment->cancel();
    }
    public static function destroy(int $appointment_id) {
        $appointment = UserAppointment::findOrFail($appointment_id);
        $appointment->delete();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'deleted a user appointment');
    }
}
