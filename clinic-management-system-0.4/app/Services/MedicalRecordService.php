<?php

namespace App\Services;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class MedicalRecordService extends Service
{
    public static function store(StoreMedicalRecordRequest $request) {
        $validatedData = $request->validated();
        return MedicalRecord::create($validatedData);
    }
    public static function update(UpdateMedicalRecordRequest $request, int $record_id) {
        $validatedData = $request->validated();
        $record = MedicalRecord::findOrFail($record_id);
        $record->update($validatedData);
        return $record;
    }
    public static function index() {
        return MedicalRecord::all();
    }
    public static function show(int $record_id) {
        return MedicalRecord::findOrFail($record_id);
    }
    public static function destory(int $record_id) {
        $record = MedicalRecord::findOrFail($record_id);
        $record->delete();
    }
    public static function showPatientRecords() {
        $user = Auth::user();
        if($user->role_id != 4) {
            throw new \Exception('You are not a patient',403);
        }
        $patient_id = $user->patient()->id;
        $records = MedicalRecord::with('prescription')->where('patient_id',$patient_id);
        return MedicalRecordResource::collection($records);
    }
    public static function admin_showPatientRecords(int $patient_id) {
        $records = MedicalRecord::with('prescription')->where('patient_id',$patient_id);
        return MedicalRecordResource::collection($records);
    }
    public static function showRecordsByDoctor() {
        $user = Auth::user();
        if($user->role_id != 3) {
            throw new \Exception('You are not a doctor',403);
        }
        $doctor_id = $user->doctor()->id;
        $records = MedicalRecord::with('prescription')->where('doctor_id',$doctor_id);
        return MedicalRecordResource::collection($records);
    }
    public static function admin_showRecordsByDoctor(int $doctor_id) {
        $records = MedicalRecord::with('prescription')->where('doctor_id',$doctor_id);
        return MedicalRecordResource::collection($records);
    }
}
