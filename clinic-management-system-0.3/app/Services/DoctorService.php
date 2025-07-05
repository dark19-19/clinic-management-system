<?php

namespace App\Services;

use App\Http\Requests\StoreDoctorDataRequest;
use App\Http\Requests\UpdateDoctorDataRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Log;
use App\Models\Prescription;
use App\Models\User;
use App\Models\UserAppointment;
use Illuminate\Http\Request;

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
        $user = User::where('email',$validatedData['email'])->first();
        $user->update([
            'role_id' => 3
        ]);
        $validatedData['user_id'] = $user->id;

        $doc_id = (function () use ($validatedData): string {
            $specializationPrefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $validatedData['specialization']), 0, 3));
            $userIdPrefix = str_pad($validatedData['user_id'] . rand(100, 999), 3, '0', STR_PAD_LEFT);
            return 'DOC-' . $specializationPrefix . '-' . $userIdPrefix;
        })();
        $validatedData['doc_id'] = $doc_id;
        $doctor = Doctor::create([
            'doc_id' => $validatedData['doc_id'],
           'user_id' => $validatedData['user_id'],
           'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'gender' => $validatedData['gender'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'specialization' => $validatedData['specialization'],
            'qualifications' => $validatedData['qualifications'],
            'birth_date' => $validatedData['birth_date'],
            'license_number' => $validatedData['license_number'],
            'call_hours' => $validatedData['call_hours'],
            'available_hours' => $validatedData['available_hours']
        ]);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'store doctor data',$doctor->email);
    }
    public static function updateData(UpdateDoctorDataRequest $request, int $doctor_id)
    {
        $validatedData = $request->validated();
        $doctor = Doctor::findOrFail($doctor_id);

        $doctor->update($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'update doctor data',$doctor->email);
    }

    public static function destroy(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'delete doctor data',$doctor->email);
    }
    public static function search(Request $request) {
        $query = $request->input('query');

        $doctor = Doctor::where('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->first();
        return [
            'doctor' => $doctor,
            'query' => $query
        ];
    }
    public static function getPatientAppointments(int $doctor_id) {
        return Appointment::where('doctor_id', $doctor_id)
            ->whereNot('status', 'completed')
            ->get();
    }
    public static function getUserAppointments(int $doctor_id) {
        return UserAppointment::where('doctor_id', $doctor_id)
            ->whereNot('status', 'completed')
            ->get();
    }
}
