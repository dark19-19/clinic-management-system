<?php

namespace App\Services;

use App\Http\Requests\StorePharmacistDataRequest;
use App\Http\Requests\UpdatePharamcistDataRequest;
use App\Models\Log;
use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Http\Request;

class PharmacistService extends Service
{
    public static function store(StorePharmacistDataRequest $request) {
        $validatedData = $request->validated();
        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $user->update([
            'role_id' => 5
        ]);
        $validatedData['user_id'] = $user->id;
        Pharmacist::create($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'store pharmacist data' , $validatedData['email']);
    }
    public static function update(UpdatePharamcistDataRequest $request, int $pharmacist_id) {
        $validatedData = $request->validated();
        $pharmacist = Pharmacist::findOrFail($pharmacist_id);
        $pharmacist->update($validatedData);
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'update pharmacist data', $pharmacist->email);
    }
    public static function index() {
        return Pharmacist::all();
    }
    public static function search(Request $request) :array {
        $query = $request->input('query');

        $pharmacist = Pharmacist::where('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->first();

        return [
            'pharmacist' => $pharmacist,
            'query' => $query
        ];
    }
    public static function destroy(int $pharmacist_id) {
        $pharmacist = Pharmacist::findOrFail($pharmacist_id);
        $pharmacist->delete();
        $operationBy = auth()->user()->email;
        Log::registerLog($operationBy, 'delete pharmacist data', $pharmacist->email);
    }
}
