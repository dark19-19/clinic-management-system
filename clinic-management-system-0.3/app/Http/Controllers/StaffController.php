<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffDataRequest;
use App\Http\Requests\UpdateStaffDataRequest;
use App\Models\Staff;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function store(StoreStaffDataRequest $request) {
        StaffService::storeData($request);
        return redirect(route('staff.index'));
    }
    public function search(Request $request) {
        $array = StaffService::search($request);
        return view('admins.staff.search', [
            'employee' => $array['employee'],
            'query' => $array['query']
        ]);
    }
    public function update(UpdateStaffDataRequest $request, int $staff_id) {
        StaffService::updateData($request, $staff_id);
        return redirect(route('staff.index'));
    }
    public function destroy(int $staff_id) {
        StaffService::destroy($staff_id);
        return redirect(route('staff.index'));
    }
    public function showCenter() {
        $staff = StaffService::index();
        return view('admins.staff.index',[
            'staff' => $staff
        ]);
    }
    public function showStore() {
        return view('admins.staff.create');
    }
    public function showSearch() {
        return view('admins.staff.search');
    }
    public function showUpdate(int $staff_id) {
        $employee = Staff::findOrFail($staff_id);
        return view('admins.staff.edit', [
            'employee' => $employee
        ]);
    }
}
