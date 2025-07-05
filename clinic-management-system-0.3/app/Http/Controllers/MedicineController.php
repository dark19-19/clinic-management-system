<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Medicine;
use App\Services\MedicineService;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function store(StoreMedicineRequest $request) {
        MedicineService::store($request);
        return redirect(route('medicine.index'));
    }
    public function showCenter() {
        $medicines = MedicineService::index();
        return view('admins.medicines.index', [
            'medicines' => $medicines
        ]);
    }
    public function showStore() {
        return view('admins.medicines.create');
    }
    public function showSearch() {
        return view('admins.medicines.search');
    }
    public function search(Request $request) {
        $array = MedicineService::search($request);
        return view('admins.medicines.search' ,[
            'query' => $array['query'],
            'medicine' => $array['medicine']
        ]);
    }
    public function showUpdate(int $medicine_id) {
        $medicine = Medicine::findOrFail($medicine_id);
        return view('admins.medicines.edit', [
            'medicine' => $medicine
        ]);
    }
    public function update(UpdateMedicineRequest $request, int $medicine_id) {
        MedicineService::update($request, $medicine_id);
        return redirect(route('medicine.index'));
    }
    public function destroy(int $medicine_id) {
        MedicineService::destroy($medicine_id);
        return redirect(route('medicine.index'));
    }
    public function filter(Request $request) {
        $medicines = MedicineService::filter($request);
        if ($medicines == 'clear') {
            return redirect(route('medicine.index'));
        }
        return view('admins.medicines.index' ,[
            'medicines' => $medicines
        ]);
    }
}
