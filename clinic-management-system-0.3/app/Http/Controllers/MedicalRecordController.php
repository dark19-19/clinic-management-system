<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Services\MedicalRecordService;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function showRecordCreateForm() {
        $doctor = auth()->user()->doctor;
        $appointments = Appointment::with('patient')
            ->where('doctor_id' , $doctor->id)
            ->where('status', 'approved')
            ->whereDate('date', today())
            ->orderBy('start_time')
            ->get();
        return view('doctors.records.create', [
            'todaysAppointments' => $appointments
        ]);
    }
    public function store(StoreMedicalRecordRequest $request) {
        MedicalRecordService::store($request);
        return redirect(route('record.create'));
    }
    public function showAdminCenter() {
        $records = MedicalRecordService::index();
        return view('admins.records.index', [
            'records' => $records
        ]);
    }
}
