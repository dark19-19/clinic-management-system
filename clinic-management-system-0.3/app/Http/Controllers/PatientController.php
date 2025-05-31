<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientDataRequest;
use App\Http\Requests\UpdatePatientDataRequest;
use App\Http\Resources\PatientResource;
use App\Services\PatientService;

class PatientController extends Controller
{
    public function store(StorePatientDataRequest $request)
    {
        $patient = PatientService::store($request);
        return response()->json([
            'message' => 'Patient data has been stored succefully',
            'patient_data' => new PatientResource($patient)
        ], 201);
    }
    public function update(int $patient_id, UpdatePatientDataRequest $request)
    {
        $patient = PatientService::update($patient_id, $request);
        return response()->json([
            'message' => 'Patient data has been updated succefully',
            'patient_data' => new PatientResource($patient)
        ], 200);
    }
    public function index()
    {
        $patients = PatientService::index();
        return response()->json([
            'patients' => PatientResource::collection($patients)
        ], 200);
    }
}
