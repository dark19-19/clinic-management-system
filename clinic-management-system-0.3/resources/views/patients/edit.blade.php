@extends('layouts.app')
@section('title','Update Data')
@section('page.title','Update Patient Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Update Data Form</h4>
        </div>
        <div class="content">
            <form method="post" action="{{route('patient.update',['id'=> $patient_id])}}">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="birthDateUpdate">Birth Date</label>
                    <input type="date" name="birth_date" id="birthDateUpdate">
                </div>
                <div class="form-row">
                    <label for="genderUpdate">Gender</label>
                    <select name="gender" id="genderUpdate">
                        <option value="" selected disabled>-- Please select --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unknown" selected>Prefer not to say</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="addressUpdate">Address</label>
                    <input type="text" name="address" id="addressUpdate">
                </div>
                <div class="form-row">
                    <label for="bloodGroupUpdate">Blood group</label>
                    <select name="blood_group" id="bloodGroupUpdate">
                        <option value="" selected disabled>-- Please select --</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+" selected>AB+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="medicalHistoryUpdate">Medical History</label>
                    <textarea name="medical_history" id="medicalHistoryUpdate"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
