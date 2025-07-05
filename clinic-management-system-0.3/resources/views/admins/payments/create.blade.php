@extends('layouts.app')
@section('title', 'Log Payment')
@section('page.title','Log A Payment')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Enter Payment Data</h4>
        </div>
        <div class="content">
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="patientsList">Patient</label>
                        <input list="patients" name="patient_id" placeholder="Search Patient..." id="patientsList" required>
                        <datalist id="patients">
                            @if(isset($patients))
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->first_name . ' ' . $patient->last_name . ' - ' . $patient->email}}</option>
                                @endforeach
                            @endif
                        </datalist>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="appointmentStore">Appointment</label>
                        <select name="appointment_id" id="appointmentStore" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            @if(isset($appointments))
                                @foreach($appointments as $appointment)
                                    <option value="{{$appointment->id}}">
                                        {{$appointment->patient->first_name . ' ' . $appointment->patient->last_name . ' - Dr. ' . $appointment->doctor->first_name . ' - '. $appointment->date }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="amountStore">Amount</label>
                        <input type="number" name="amount" id="amountStore" required>
                        <div class="validation-error">
                            @error('amount')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="methodStore">Payment Method</label>
                        <select id="methodStore" name="payment_method" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            <option value="cash">Cash</option>
                            <option value="bank-transfer">Bank Transfer</option>
                            <option value="visa">Visa Card</option>
                            <option value="master-card">Master Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                        <div class="validation-error">
                            @error('payment_method')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="transactionStore">Transaction ID</label>
                    <input type="text" name="transaction_id" id="transactionStore">
                    <div class="validation-error">
                        @error('transaction_id')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="notesStore">Notes</label>
                    <textarea name="notes" id="notesStore"></textarea>
                    <div class="validation-error">
                        @error('notes')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('payments-center').classList.add('active');
    </script>
@endsection
