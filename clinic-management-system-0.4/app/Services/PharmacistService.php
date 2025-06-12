<?php

namespace App\Services;

use App\Http\Requests\StorePharmacistDataRequest;
use App\Models\Pharmacist;

class PharmacistService extends Service
{
    public static function store(StorePharmacistDataRequest $request) {
        $validatedData = $request->validated();
        $pharmacist = Pharmacist::where('user_id',$validatedData['user_id'])->firstOrFail();
        $pharmacist->update([
            'license_number' => $validatedData['license_number']
        ]);
        return $pharmacist;
    }
    public static function index() {
        return Pharmacist::all();
    }
    public static function destroy(int $pharmacist_id) {
        $pharmacist = Pharmacist::findOrFail($pharmacist_id);
        $pharmacist->update([
            'license_number' => null
        ]);
    }
    public static function showById(int $pharmacist_id) {
        return Pharmacist::findOrFail($pharmacist_id);
    }
    public static function showByLicenseNumber(string $licenceNumber) {
        return Pharmacist::where('license_number',$licenceNumber)->findOrFail();
    }
}
