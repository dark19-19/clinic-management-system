<?php

namespace App\Services;

use App\Http\Requests\IfInventoryExistsRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;

class InventoryService extends Service
{
    public static function store(StoreInventoryRequest $request) {
        $validatedData = $request->validated();
        return $validatedData['quantity'] < 0 ? throw new \Exception('You cannot enter a negative quantity') : Inventory::create([
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'expiry_date' => now()->addYears(2)
        ]);

    }
    public static function update(UpdateInventoryRequest $request, int $inventory_id) {
        $validatedData = $request->validated();
        $inventory = Inventory::findOrFail($inventory_id);
        return $inventory->update($validatedData);
    }
    public static function index() {
        return Inventory::all();
    }
    public static function show(int $inventory_id) {
        return Inventory::findOrFail($inventory_id);
    }
    public static function destory(int $inventory_id) {
        $inventory = Inventory::findOrFail($inventory_id);
        $inventory->delete();
    }
    public static function exists(IfInventoryExistsRequest $request) {
        $validatedName = $request->validated();
        $inventory = Inventory::where('name',$validatedName)->firstOrFail();
        if($inventory != null && $inventory->quantity != 0) {
            return true;
        }
        return false;
    }
    public static function trackExpiring() {
        $inventories = Inventory::all();
        $nearExpiry = [];
        foreach ($inventories as $inventory) {
            if($inventory->expiry_date <= now()->addWeek()) {
                array_push($nearExpiry, $inventory);
            }
        }
        return $nearExpiry;
    }
}
