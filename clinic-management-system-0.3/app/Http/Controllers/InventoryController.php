<?php

namespace App\Http\Controllers;

use App\Http\Requests\IfInventoryExistsRequest;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function store(StoreInventoryRequest $request) {
        return response()->json([
            'message' => 'Inventory stored successfully',
            'inventory' => InventoryService::store($request)
        ],201);
    }
    public function update(UpdateInventoryRequest $request, int $inventory_id) {
        return response()->json([
            'message' => 'Inventory has been updated successfully',
            'inventory' => InventoryService::update($request,$inventory_id)
        ],200);
    }
    public function index() {
        return response()->json([
            'message' => 'These are all items in the inventory',
            'items' => InventoryService::index()
        ],200);
    }
    public function show(int $inventory_id) {
        return response()->json([
            'message' => 'This is the inventory you requested for',
            'inventory' => InventoryService::show($inventory_id)
        ],200);
    }
    public function destory(int $inventory_id) {
        InventoryService::destory($inventory_id);
        return response()->json([
            'message' => 'The inventory has been deleted'
        ],200);
    }
    public function exists(IfInventoryExistsRequest $request) {
        $val = InventoryService::exists($request);
        if($val) {
            return response()->json([
                'message' => 'The item you entered exists in the storage'
            ]);
        }
        return response()->json([
            'message' => 'The item you entered is not found'
        ],404);
    }
}
