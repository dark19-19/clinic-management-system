<?php

namespace App\Services;

use App\Http\Requests\StoreDoctorDataRequest;
use App\Http\Requests\UpdateDoctorDataRequest;
use App\Models\Doctor;

class DoctorService extends Service
{
    public static function index()
    {
        return Doctor::all();
    }
    // Manager Functions:

    public static function storeData(StoreDoctorDataRequest $request)
    {
        $validatedData = $request->validated();
        $doctor = Doctor::where('user_id', $validatedData['user_id'])->firstOrFail();

        $doc_id = function () use ($validatedData): string {
            $specilizationPrefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $validatedData['specilization']), 0, 3));
            $userIdPrefix = str_pad($validatedData['user_id'] . rand(100, 999), 3, '0', STR_PAD_LEFT);
            return 'DOC-' . $specilizationPrefix . '-' . $userIdPrefix;
        };

        $doctor->update([
            'doc_id' => $doc_id,
            'specilization' => $validatedData['specilization'],
            'license_number' => $validatedData['license_number'],
            'qualifications' => $validatedData['qualifications']
        ]);

        return $doctor;
    }
    public static function updateData(UpdateDoctorDataRequest $request)
    {
        $validatedData = $request->validated();
        $doctor = Doctor::where('user_id',  $validatedData['user_id']);

        $doctor->update([
            'specilization' => $validatedData['specilization'],
            'license_number' => $validatedData['license_number'],
            'qualifications' => $validatedData['qualifications']
        ]);

        return $doctor;
    }
    public static function showById(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        return $doctor;
    }
    public static function showByDocId(string $doc_id)
    {
        $doctor = Doctor::where('doc_id', $doc_id)->first();
        return $doctor;
    }

    public static function destroy(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update([
            'specilization' => null,
            'doc_id' => null,
            'license_number' => null,
            'qualifications' => null
        ]);
    }
}
