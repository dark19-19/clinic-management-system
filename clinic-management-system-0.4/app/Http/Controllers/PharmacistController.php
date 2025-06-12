<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePharmacistDataRequest;
use App\Http\Resources\PharmacistResource;
use App\Services\PharmacistService;

class PharmacistController extends Controller
{
    public function store(StorePharmacistDataRequest $request) {
        $pharmacist = PharmacistService::store($request);
        return response()->json([
            'message' => 'Pharmacist data stored successfully',
            'pharmacist' => new PharmacistResource($pharmacist)
        ],200);
    }
    public function index() {
        return response()->json([
            'mesage' => 'Here are all the registered pharmacists',
            'pharmacists' => PharmacistService::index()
        ],200);
    }
    public function destroy(int $pharmacist_id) {
        PharmacistService::destroy($pharmacist_id);
        return response()->json([
            'message' => 'Pharmacist data has been deleted'
        ],200);
    }
    public function show(int $pharmacist_id) {
        return response()->json([
            'pharmacist' => PharmacistService::showById($pharmacist_id)
        ],200);
    }
    public function showByLicenseNumber(string $licenseNumber) {
        return response()->json([
            'pharmacist' => PharmacistService::showByLicenseNumber($licenseNumber)
        ],200);
    }
}
