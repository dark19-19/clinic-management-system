<?php

namespace App\Services;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Http\Resources\MedicalRecordResource;
use App\Models\Appointment;
use App\Models\Log;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class MedicalRecordService extends Service
{
    public static function store(StoreMedicalRecordRequest $request) {
        $validatedData = $request->validated();
        $doctor_id = \auth()->user()->doctor->id;
        $patient_id = Patient::where('email', $validatedData['patient_email'])->first()->id;
        $appointment = Appointment::findOrFail($validatedData['appointment_id']);
        $appointment->complete();
        $validatedData['patient_id'] = $patient_id;
        $validatedData['doctor_id'] = $doctor_id;
        MedicalRecord::create($validatedData);
        Log::registerLog(\auth()->user()->email, 'created a patient medical record', $validatedData['patient_email']);
    }
    public static function index() {
        return MedicalRecord::with('patient')
            ->with('doctor')
            ->with('appointment')
            ->get();
    }
}
