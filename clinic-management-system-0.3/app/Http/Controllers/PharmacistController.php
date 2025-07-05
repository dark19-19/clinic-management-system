<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePharmacistDataRequest;
use App\Http\Requests\UpdatePharamcistDataRequest;
use App\Http\Resources\PharmacistResource;
use App\Models\Pharmacist;
use App\Services\PharmacistService;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    public function store(StorePharmacistDataRequest $request) {
        PharmacistService::store($request);
        return redirect(route('pharma.index'));
    }
    public function update(UpdatePharamcistDataRequest $request, int $pharmacist_id) {
        PharmacistService::update($request,$pharmacist_id);
        return redirect(route('pharma.index'));
    }
    public function search(Request $request) {
        $array = PharmacistService::search($request);
        return view('admins.pharmas.search', [
            'pharmacist' => $array['pharmacist'],
            'query' => $array['query']
        ]);
    }
    public function destroy(int $pharmacist_id) {
        PharmacistService::destroy($pharmacist_id);
        return redirect(route('pharma.index'));
    }
    public function showCenter() {
        $pharmacists = PharmacistService::index();
        return view('admins.pharmas.index', [
            'pharmacists' => $pharmacists
        ]);
    }
    public function showStore() {
        return view('admins.pharmas.create');
    }
    public function showSearch() {
        return view('admins.pharmas.search');
    }
    public function showUpdate(int $pharmacist_id)  {
        $pharmacist = Pharmacist::findOrFail($pharmacist_id);
        return view('admins.pharmas.edit', [
            'pharmacist' => $pharmacist
        ]);
    }
}
