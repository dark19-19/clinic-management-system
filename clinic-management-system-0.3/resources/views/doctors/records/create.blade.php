@extends('layouts.app')
@section('title', 'Create Record')
@section('page.title', 'Create Record')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill the form</h4>
        </div>
        <div class="content">
            <form action="{{route('record.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-row">
                    <label for="patientEmailStore">Patient's Email</label>
                    <input type="email" name="patient_email" id="patientEmailStore" required>
                    <div class="validation-error">
                        @error('patient_email')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="appointmentSelect">Appointment</label>
                    <select name="appointment_id" id="appointmentSelect" required>
                        <option value="" selected disabled>-- Please Select --</option>
                        @foreach($todaysAppointments as $appointment)
                            <option
                                value="{{$appointment->id}}">{{$appointment->patient->first_name . ' ' . $appointment->patient->last_name . ' - '. $appointment->start_time}}</option>
                        @endforeach
                    </select>
                    <div class="validation-error">
                        @error('$appointment_id')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="diagnosisStore">Diagnosis</label>
                        <input type="text" name="diagnosis" id="diagnosisStore" required>
                        <div class="validation-error">
                            @error('diagnosis')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="treatmentStore">Treatment</label>
                        <input type="text" name="treatment" id="treatmentStore" required>
                    </div>
                </div>
                <div class="form-row">
                    <label for="notesStore">Notes</label>
                    <textarea name="notes" id="notesStore" required></textarea>
                </div>
                <div class="form-row">
                    <label for="followUpStore">Follow Up Date</label>
                    <input type="date" name="follow_up_date" id="followUpStore">
                </div>

                <button type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection
