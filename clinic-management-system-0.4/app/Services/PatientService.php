<?php

namespace App\Services;

use App\Http\Requests\StorePatientDataRequest;
use App\Http\Requests\UpdatePatientDataRequest;
use App\Models\Patient;

class PatientService extends Service
{
    public static function store(StorePatientDataRequest $request)
    {
        $validatedData = $request->validated();
        $patient = Patient::where('user_id', $validatedData['user_id'])->firstOrFail();
        $patient->update([
            'age' => $validatedData['age'],
            'birth_date' => $validatedData['birth_date'],
            'gender' => $validatedData['gender'],
            'address' => $validatedData['address'],
            'blood_group' => $validatedData['blood_group'],
            'medical_history' => $validatedData['medical_history']
        ]);
        return $patient;
    }
    public static function update(int $patient_id, UpdatePatientDataRequest $request)
    {
        $validatedData = $request->validated();
        $patient = Patient::findOrFail($patient_id);
        $patient->update($validatedData);
        return $patient;
    }
    public static function index()
    {
        return Patient::all();
    }
    public static function showById(int $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        return $patient;
    }
    public static function destroy(int $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $patient->update([
            'age' => null,
            'birth_date' => null,
            'gender' => null,
            'address' => null,
            'blood_group' => null,
            'medical_history' => null
        ]);
        return $patient;
    }
}
