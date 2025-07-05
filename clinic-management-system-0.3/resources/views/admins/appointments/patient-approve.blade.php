@extends('layouts.app')
@section('title','Approve Appointment')
@section('page.title', 'Approve Appointment')
@section('content')
    <div class="card" style="height: 70vh">
        <div class="title">
            <h4>Approve Appointment</h4>
        </div>
        <div class="content">
            <form action="{{route('patient.appointment.approve', $appointment->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-row">
                    <label for="reason">Reason</label>
                    <input type="text" id="reason" value="{{$appointment->reason}}" disabled>
                </div>
                <div class="form-row">
                    <label for="doctorSync">Choose a doctor</label>
                    <select name="doctor_id" id="doctorSync">
                        @foreach($doctors as $doctor)
                            <option
                                value="{{$doctor->id}}">{{$doctor->first_name . ' ' . $doctor->last_name . ' - '. $doctor->specialization . ' - ' . $doctor->available_hours}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Approve</button>
            </form>
        </div>
    </div>
@endsection
