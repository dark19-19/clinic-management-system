<?php

namespace App\Services;

use App\Http\Requests\StoreStaffDataRequest;
use App\Http\Requests\UpdateStaffDataRequest;
use App\Models\Log;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffService extends Service
{
    public static function index() {
        return Staff::all();
    }
    public static function storeData(StoreStaffDataRequest $request) {
        $validatedData = $request->validated();
        $user = User::where('email',$validatedData['email'])->firstOrFail();
        $user->update([
            'role_id' => 2
        ]);
        $validatedData['user_id'] = $user->id;
        Staff::create($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'store staff data',$validatedData['email']);
    }
    public static function search(Request $request) {
        $query = $request->input('query');

        $employee = Staff::where('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->first();

        return [
            'employee' => $employee,
            'query' => $query
        ];
    }
    public static function updateData(UpdateStaffDataRequest $request, int $staff_id) {
        $validatedData = $request->validated();
        $staff = Staff::findOrFail($staff_id);
        $staff->update($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'update staff data',$staff->email);
    }
    public static function destroy(int $staff_id) {
        $staff = Staff::findOrFail($staff_id);
        $staff->delete();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'delete staff data',$staff->email);
    }
}
