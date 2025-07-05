@extends('layouts.app')
@section('title','Edit Data')
@section('page.title','Edit Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Edit Data</h4>
        </div>
        <div class="content">
            <form action="{{route('patient.update',$patient->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="addressUpdate">Address</label>
                    <input type="text" name="address" id="addressUpdate" value="{{$patient->address ?? ''}}">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="phoneUpdate">Phone Number</label>
                        <input type="text" name="phone" id="phoneUpdate" value="{{$patient->phone ?? ''}}">
                        @error('phone')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="emergencyUpdate">Emergency Contact</label>
                        <input type="text" name="emergency_contact" id="emergencyUpdate" value="{{$patient->emergency_contact ?? ''}}">
                        @error('emergency_contact')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                        <label for="insuranceUpdate">Insurance Info</label>
                        <input type="text" name="insurance_info" id="insuranceUpdate" value="{{$patient->insurance_info ?? ''}}">
                        @error('insurance_info')
                        {{$message}}
                        @enderror
                </div>
                <div class="form-row">
                    <label for="medicalHistoryUpdate">Medical History</label>
                    <textarea name="medical_history" id="medicalHistoryUpdate">{{$patient->medical_history ?? ''}}</textarea>
                    @error('medical_history')
                    {{$message}}
                    @enderror
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('patients-center').classList.add('active');
    </script>
@endsection
