<?php

namespace App\Services;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Http\Requests\UpdateMedicalRecordRequest;
use App\Models\MedicalRecord;

class MedicalRecordService extends Service
{
    public static function store(StoreMedicalRecordRequest $request) {
        $validatedData = $request->validated();
        return MedicalRecord::create($validatedData);
    }
    public static function update(UpdateMedicalRecordRequest $request, int $record_id) {
        $validatedData = $request->validated();
        $record = MedicalRecord::findOrFail($record_id);
        $record->update($validatedData);
        return $record;
    }
    public static function index() {
        return MedicalRecord::all();
    }
    public static function show(int $record_id) {
        return MedicalRecord::findOrFail($record_id);
    }
    public static function destory(int $record_id) {
        $record = MedicalRecord::findOrFail($record_id);
        $record->delete();
    }
}
