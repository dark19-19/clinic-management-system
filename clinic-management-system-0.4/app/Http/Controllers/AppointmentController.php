<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
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
        return response()->json([
            'message' => 'Your appointment has been canceled, and it will be deleted after 24 hours',
        ]);
    }
    public function approve(int $appointment_id) {
        $appointment = AppointmentService::approve($appointment_id);
        return response()->json([
            'message' => 'Appointment has been approved',
            'appointment' => $appointment
        ]);
    }
    public function reject(int $appointment_id) {
        $appointment = AppointmentService::reject($appointment_id);
        return response()->json([
            'message' => 'Appointment has been rejected',
            'appointment' => $appointment
        ]);
    }
    public function index() {
        return response()->json([
            'message' => 'These are all the appointments',
            'appointments' => AppointmentService::index()
        ]);
    }
    public function show(int $appointment_id) {
        return response()->json([
            'message' => 'This is the appointment you requested for',
            'appointment' => AppointmentService::show($appointment_id)
        ]);
    }
    public function showPatientAppointments() {
        return response()->json([
            'message' => 'These are your appointments',
            'appointments' => AppointmentService::showPatientAppointments()
        ]);
    }
    public function admin_showPatientAppointments(int $patient_id) {
        return response()->json([
            'message' => 'These are the petient appointments',
            'appointments' => AppointmentService::admin_showPatientAppointments($patient_id)
        ]);
    }
}
