<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Services\PrescriptionService;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function store(StorePrescriptionRequest $request) {
        return response()->json([
            'message' => 'Prescription has been saved',
            'data' => PrescriptionService::store($request)
        ],201);
    }
    public function update(UpdatePrescriptionRequest $request, int $prescription_id) {
        return response()->json([
            'message' => 'Prescription has been updated',
            'prescription' => PrescriptionService::update($request,$prescription_id)
        ],200);
    }
    public function index() {
        return response()->json([
            'message' => 'Here are all the prescriptions',
            'prescriptions' => PrescriptionService::index()
        ],200);
    }
    public function show(int $prescription_id) {
        return response()->json([
            'message' => 'Here are the prescription you requested',
            'prescriptions' => PrescriptionService::show($prescription_id)
        ],200);
    }
    public function destroy(int $prescription_id) {
        PrescriptionService::destroy($prescription_id);
        return response()->json([
            'message' => 'Prescription has been deleted'
        ],200);
    }
    public function showPatientPrescriptions() {
        return response()->json([
            'message' => 'Here are all your prescriptions',
            'prescriptions' => PrescriptionService::showPatientPrescriptions()
        ],200);
    }
    public function admin_showPatientPrescriptions(int $patient_id) {
        return response()->json([
            'message' => 'Here are all the patient prescriptions',
            'prescriptions' => PrescriptionService::admin_showPatientPrescriptions($patient_id)
        ],200);
    }
    public function showPrescriptionsByDoctor() {
        return response()->json([
            'message' => 'Here are all the prescriptions made by you',
            'prescriptions' => PrescriptionService::showPrescriptionsByDoctor()
        ],200);
    }
    public function admin_showPrescriptionsByDoctor(int $doctor_id) {
        return response()->json([
            'message' => 'Here are all the prescriptions made by this doctor',
            'prescriptions' => PrescriptionService::admin_showPrescriptionsByDoctor($doctor_id)
        ],200);
    }
}
