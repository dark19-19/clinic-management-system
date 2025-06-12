<?php

namespace App\Services;

use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Http\Resources\PrescriptionResource;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;

class PrescriptionService extends Service
{
    public static function store(StorePrescriptionRequest $request) {
        $validatedData = $request->validated();
        $prescription = Prescription::create($validatedData);
        return [
            'patient_name' => Patient::findOrFail($validatedData['patient_id'])->name,
            'doctor_name' => Doctor::findOrFail($validatedData['doctor_id'])->name,
            'prescription' => new PrescriptionResource($prescription)
        ];
    }
    public static function update(UpdatePrescriptionRequest $request, int $prescription_id) {
        $validatedData = $request->validated();
        $prescription = Prescription::findOrFail($prescription_id);
        $prescription->update($validatedData);
        return new PrescriptionResource($prescription);
    }
    public static function index() {
        return Prescription::all();
    }
    public static function show(int $prescription_id) {
        return Prescription::findOrFail($prescription_id);
    }
    public static function destroy(int $prescription_id) {
        $prescription = Prescription::findOrFail($prescription_id);
        $prescription->delete();
    }
    public static function showPatientPrescriptions() {
        $user = Auth::user();
        if($user->role_id != 4) {
            throw new \Exception('You are not a patient',403);
        }
        $patient_id = $user->patient()->id;
        $prescriptions = Prescription::where('patient_id',$patient_id)->get();
        return PrescriptionResource::collection($prescriptions);
    }
    public static function admin_showPatientPrescriptions(int $patient_id) {
        $prescriptions = Prescription::where('patient_id', $patient_id)->get();
        return PrescriptionResource::collection($prescriptions);
    }
    public static function showPrescriptionsByDoctor() {
        $user = Auth::user();
        if($user->role_id != 3) {
            throw new \Exception('You are not a doctor',403);
        }
        $doctor_id = $user->doctor()->id;
        $prescriptions = Prescription::where('doctor_id',$doctor_id)->get();
        return PrescriptionResource::collection($prescriptions);
    }
    public static function admin_showPrescriptionsByDoctor(int $doctor_id) {
        $prescriptions = Prescription::where('doctor_id',$doctor_id);
        return PrescriptionResource::collection($prescriptions);
    }
}
