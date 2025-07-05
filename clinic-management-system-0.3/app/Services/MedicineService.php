<?php

namespace App\Services;

use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\Log;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineService extends Service
{
    public static function store(StoreMedicineRequest $request) {
        $validatedData = $request->validated();
        Medicine::create($validatedData);
        Log::registerLog(auth()->user()->email, 'stored a medicine');
    }
    public static function index() {
        return Medicine::all();
    }
    public static function search(Request $request) {
        $query = $request->input('query');
        $medicine = Medicine::where('name' , 'like', "%$query%")->first();

        return [
            'query' => $query,
            'medicine' => $medicine
        ];
    }
    public static function update(UpdateMedicineRequest $request, int $medicine_id) {
        $medicine = Medicine::findOrFail($medicine_id);
        $validatedData = $request->validated();
        $medicine->update($validatedData);
        Log::registerLog(auth()->user()->email, 'update medicine');
    }
    public static function destroy(int $medicine_id) {
        $medicine = Medicine::findOrFail($medicine_id);
        $medicine->delete();
        Log::registerLog(auth()->user()->email, 'delete medicine');
    }
    public static function filter(Request $request) {
        $query = $request->input('category');
        if ($query == 'clear') {
            return $query;
        }
        return Medicine::where('category', 'like' , "%$query%")->get();
    }
}
