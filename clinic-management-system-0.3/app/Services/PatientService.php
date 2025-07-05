<?php

namespace App\Services;

use App\Http\Requests\StorePatientDataRequest;
use App\Http\Requests\UpdatePatientDataRequest;
use App\Models\Appointment;
use App\Models\Log;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;

class PatientService extends Service
{
    public static function store(StorePatientDataRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $user->update([
            'role_id' => 4
        ]);
        $validatedData['user_id'] = $user->id;
        $patient = Patient::create([
            'user_id' => $validatedData['user_id'],
            'email' => $validatedData['email'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'birth_date' => $validatedData['birth_date'],
            'gender' => $validatedData['gender'],
            'address' => $validatedData['address'],
            'phone' =>$validatedData['phone'],
            'emergency_contact' => $validatedData['emergency_contact'],
            'insurance_info' => $validatedData['insurance_info'],
            'blood_group' => $validatedData['blood_group'],
            'medical_history' => $validatedData['medical_history']
        ]);
        $operationBy = auth()->user()->email;


        Log::registerLog($operationBy, 'store patient data',$patient->email);
    }
    public static function update(int $patient_id, UpdatePatientDataRequest $request)
    {
        $validatedData = $request->validated();
        $patient = Patient::findOrFail($patient_id);
        $patient->update($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'update patient data',$patient->email);
    }
    public static function index()
    {
        return Patient::all();
    }
    public static function destroy(int $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $patient->delete();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'delete patient data',$patient->email);
    }
    public static function search(Request $request) {
        $query = $request->input('query');

        $patient = Patient::where('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->first();

        return [
            'patient' => $patient,
            'query' => $query
        ];
    }
    public static function getAppointments(int $patient_id) {
        return Appointment::where('patient_id', $patient_id)
            ->whereNot('status', 'completed')
            ->get();
    }
    public static function getMedicalRecords(int $patient_id) {
        return MedicalRecord::where('patient_id',$patient_id)->get();
    }
    public static function getPayments(int $patient_id) {
        return Payment::where('patient_id' , $patient_id)->get();
    }
    public static function getPrescriptions(int $patient_id) {
        $records = self::getMedicalRecords($patient_id);
        $prescs = [];
        foreach ($records as $record) {
            $prescriptions = Prescription::where('medical_record_id', $record->id)->get();
            foreach ($prescriptions as $prescription) {
                array_push($prescs, $prescription);
            }
        }
        return $prescs;
    }
}
