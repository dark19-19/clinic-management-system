@extends('layouts.app')
@section('title','Store Patient')
@section('page.title','Store Patient Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill The Data</h4>
        </div>
        <div class="content">
            <form action="{{route('patient.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="firstNameStore">First Name</label>
                        <input type="text" name="first_name" id="firstNameStore" required>
                        @error('first_name')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="lastNameStore">Last Name</label>
                        <input type="text" name="last_name" id="lastNameStore" required>
                        @error('last_name')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="emailStore">Email</label>
                    <input type="email" name="email" id="emailStore" required>
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="birthDateStore">Date Of Birth</label>
                        <input type="date" name="birth_date" id="birthDateStore" required>
                        @error('birth_date')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="genderStore">Gender</label>
                        <select name="gender" id="genderStore" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="addressStore">Address</label>
                    <input type="text" name="address" id="addressStore" required>
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="phoneStore">Phone Number</label>
                        <input type="text" name="phone" id="phoneStore" required>
                        @error('phone')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="emergencyStore">Emergency Contact</label>
                        <input type="text" name="emergency_contact" id="emergencyStore" required>
                        @error('emergency_contact')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="bloodGroupStore">Blood Group</label>
                        <select name="blood_group" id="bloodGroupStore" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            <option value="A+">A+</option>
                            <option value="B+">b+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                        @error('blood_group')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="insuranceStore">Insurance Info</label>
                        <input type="text" name="insurance_info" id="insuranceStore">
                        @error('insurance_info')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="medicalHistoryStore">Medical History</label>
                    <textarea name="medical_history" id="medicalHistoryStore"></textarea>
                    @error('medical_history')
                    {{$message}}
                    @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('patients-center').classList.add('active');
    </script>
@endsection
