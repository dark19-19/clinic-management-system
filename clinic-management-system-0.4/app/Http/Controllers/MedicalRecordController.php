<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Services\MedicalRecordService;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function store(StoreMedicalRecordRequest $request) {
        return response()->json([
            'message' => 'Record has been logged successfully',
            'record' => MedicalRecordService::store($request)
        ],201);
    }
    public function update(UpdateMedicalRecordRequest $request, int $record_id) {
        return response()->json([
            'message' => 'Record has been updated',
            'record' => MedicalRecordService::update($request,$record_id)
        ],200);
    }
    public function index() {
        return response()->json([
            'message' => 'Here are all the records',
            'records' => MedicalRecordService::index()
        ],200);
    }
    public function show(int $record_id) {
        return response()->json([
            'message' => 'Here is the record',
            'record' => MedicalRecordService::show($record_id)
        ],200);
    }
    public function destory(int $record_id) {
        MedicalRecordService::destory($record_id);
        return response()->json([
            'message' => 'Record has been deleted'
        ],200);
    }
    public function showPatientRecords() {
        return response()->json([
            'message' => 'Here are your records',
            'records' => MedicalRecordService::showPatientRecords()
        ],200);
    }
    public function admin_showPatientRecords(int $patient_id) {
        return response()->json([
            'message' => 'Here are all the patient records',
            'records' => MedicalRecordService::admin_showPatientRecords($patient_id)
        ],200);
    }
    public function showRecordsByDoctor() {
        return response()->json([
            'message' => 'Here are the records made by you',
            'records' => MedicalRecordService::showRecordsByDoctor()
        ],200);
    }
    public function admin_showRecordsByDoctor(int $doctor_id) {
        return response()->json([
            'message' => 'Here are the records made by the doctor you requested',
            'records' => MedicalRecordService::admin_showRecordsByDoctor($doctor_id)
        ],200);
    }
}
