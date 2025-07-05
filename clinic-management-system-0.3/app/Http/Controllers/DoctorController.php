<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorDataRequest;
use App\Http\Requests\UpdateDoctorDataRequest;
use App\Http\Resources\DoctorAppointmentResource;
use App\Http\Resources\DoctorPrescriptionResource;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Models\Log;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    //      Manager Functions:

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorDataRequest $request)
    {
        DoctorService::storeData($request);
        return redirect(route('doctor.index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorDataRequest $request, int $doctor_id)
    {
        DoctorService::updateData($request, $doctor_id);
        return redirect(route('doctor.find'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        DoctorService::destroy($id);
        return redirect()->route('success')
            ->with('message', 'Doctor Data Has Been Deleted Successfully.')
            ->with('redirectRoute', 'doctor.index')
            ->with('countdown', 5);
    }
    public function search(Request $request) {
        $array = DoctorService::search($request);
        return view('admins.doctors.search',[
            'query' => $array['query'],
            'doctor' => $array['doctor']
        ]);
    }
    public function showCenter() {
        $doctors = DoctorService::index();
        return view('admins.doctors.index')->with([
            'doctors' => $doctors
        ]);
    }
    public function showPatientAppointments(int $doctor_id) {
        $appointments = DoctorService::getPatientAppointments($doctor_id);
        return view('admins.appointments.patients-appointments', [
            'appointments' => $appointments
        ]);
    }
    public function showUserAppointments(int $doctor_id) {
        $appointments = DoctorService::getUserAppointments($doctor_id);
        return view('admins.appointments.users-appointments', [
            'appointments' => $appointments
        ]);
    }
    public function showStore() {
        return view('admins.doctors.create');
    }
    public function showSearch() {
        return view('admins.doctors.search');
    }
    public function showUpdate(int $doctor_id) {
        $doctor = Doctor::findOrFail($doctor_id);
        return view('admins.doctors.edit',compact('doctor'));
    }
}
