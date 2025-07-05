<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(StorePaymentRequest $request) {
        PaymentService::store($request);
        return redirect(route('payment.index'));
    }
    public function search(Request $request) {
        $array = PaymentService::search($request);
        return view('admins.payments.search', [
            'query' => $array['query'],
            'payments' => $array['payments']
        ]);
    }
    public function filter(Request $request) {
        $filtered = PaymentService::filter($request);
        if ($filtered == 'clear') {
            return redirect(route('payment.index'));
        }
        return view('admins.payments.index', [
            'payments' => $filtered
        ]);
    }
    public function showCenter() {
        $payments = PaymentService::index();
        return view('admins.payments.index', [
            'payments' => $payments
        ]);
    }
    public function showStore() {
        $patients = Patient::all();
        $appointments = Appointment::with('patient')
            ->with('doctor')
            ->whereDate('date', today())
            ->where('status', 'completed')
            ->get();
        return view('admins.payments.create', [
            'patients' => $patients,
            'appointments' => $appointments
        ]);
    }
    public function showSearch() {
        return view('admins.payments.search');
    }
}
