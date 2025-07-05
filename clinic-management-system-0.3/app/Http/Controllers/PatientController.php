<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientDataRequest;
use App\Http\Requests\UpdatePatientDataRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\DashboardService;
use App\Services\PatientService;
use Illuminate\Http\Request;
class PatientController extends Controller
{
    public function store(StorePatientDataRequest $request)
    {
        PatientService::store($request);
        return redirect(route('patient.index'));
    }
    public function update(int $patient_id, UpdatePatientDataRequest $request)
    {
        PatientService::update($patient_id, $request);
        return redirect(route('patient.find'));
    }
    public function destroy(int $patient_id)
    {
        PatientService::destroy($patient_id);
        return redirect()->route('success')
            ->with('message', 'Patient Data Has Been Deleted Successfully.')
            ->with('redirectRoute', 'patient.index')
            ->with('countdown', 5);
    }
    public function search(Request $request) {
        $array = PatientService::search($request);
        return view('admins.patients.search', [
            'query' => $array['query'],
            'patient' => $array['patient']
        ]);
    }

    public function showCenter() {
        $patients = PatientService::index();
        return view('admins.patients.index',[
            'patients' => $patients
        ]);
    }
    public function showStore() {
        return view('admins.patients.create');
    }
    public function showSearch() {
        return view('admins.patients.search');
    }
    public  function showUpdate(int $patient_id) {
        $patient = Patient::findOrFail($patient_id);
        return view('admins.patients.edit', [
            'patient' => $patient
        ]);
    }
    public function showAppointments(int $patient_id) {
        $appointments = PatientService::getAppointments($patient_id);
        return view('admins.appointments.patients-appointments', [
            'appointments' => $appointments
        ]);
    }
    public function showRecords(int $patient_id) {
        $records = PatientService::getMedicalRecords($patient_id);
        return view('admins.records.index', [
            'records' => $records
        ]);
    }
    public function showPayments(int $patient_id) {
        $payments = PatientService::getPayments($patient_id);
        return view('admins.payments.index', [
            'payments' => $payments
        ]);
    }
    public function showPrescriptions(int $patient_id) {
        $prescriptions = PatientService::getPrescriptions($patient_id);
        return view('admins.prescs.index', [
            'prescs' => $prescriptions
        ]);
    }
}
