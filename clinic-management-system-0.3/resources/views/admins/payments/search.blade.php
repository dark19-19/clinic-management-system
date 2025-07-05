@extends('layouts.app')
@section('title','Search Payment')
@section('page.title','Search For A pyament')
@section('content')
    <div class="card" style="min-height: 70vh">
        <div class="title">
            <h4>Search</h4>
        </div>
        <div class="content">
            <form action="{{route('payment.search')}}" method="GET" class="search-form">
                @csrf
                @method('get')
                <div class="form-row flex flex-row gap-10">
                    <input type="text" name="query" placeholder="Search by transaction ID" value="{{$query ?? ''}}" class="w-100">
                    <button type="submit">Search</button>
                </div>
            </form>
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
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
    </script>
@endsection
