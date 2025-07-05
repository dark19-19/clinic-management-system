@extends('layouts.app')
@section('title', 'Payments')
@section('page.title','Payments')
@section('content')
    <div class="card" style="min-height: 70vh">
        <div class="title">
            <h4>Payments</h4>
        </div>
        <div class="content">
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Amount</th>
                        <th class="filter-head-cell">
                            <form action="{{route('payment.filter')}}" method="GET" class="filter-form" id="filter-form">
                                @csrf
                                @method('GET')
                                <div class="form-row">
                                    <select name="key" id="filter-select">
                                        <option value="" selected disabled>Method</option>
                                        <option value="clear">Clear Filter</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank-transfer">Bank Transfer</option>
                                        <option value="visa">Visa Card</option>
                                        <option value="master-card">Master Card</option>
                                        <option value="paypal">PayPal</option>
                                    </select>
                                </div>
                            </form>
                        </th>
                        <th>Status</th>
                        <th>Transaction ID</th>
                        <th>Notes</th>
                        <th>Quick Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($payments))
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{$payment->patient->first_name . ' ' . $payment->patient->last_name}}</td>
                                <td>{{$payment->appointment->date}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->payment_method}}</td>
                                <td>{{$payment->status}}</td>
                                <td>{{$payment->transaction_id}}</td>
                                <td>{{$payment->notes}}</td>
                                <td class="quick-actions flex flex-row"></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('payments-center').classList.add('active');
        document.getElementById('filter-select').onchange = function () {
            document.getElementById('filter-form').submit();
        };
    </script>
@endsection
