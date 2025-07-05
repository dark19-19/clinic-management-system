<?php

namespace App\Services;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Log;
use App\Models\Patient;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentService extends Service
{
    public static function index() {
        return Payment::with('patient')
            ->with('appointment')
            ->get();
    }
    public static function store(StorePaymentRequest $request)
    {
        $validatedData = $request->validated();
        Payment::create($validatedData);
        $patient_email = Patient::findOrFail($validatedData['patient_id'])->email;
        Log::registerLog(auth()->user()->email, 'logged a payment', $patient_email);
    }
    public static function search(Request $request) {
        $query = $request->input('query');
        $payments = Payment::where('transaction_id', 'like', $query)->get();
        return [
            'query' => $query,
            'payments' => $payments
        ];
    }
    public static function filter(Request $request) {
        $filter = $request->input('key');
        if ($filter == 'clear') {
            return $filter;
        }
        return Payment::where('payment_method', 'like', $filter)->get();
    }
}
