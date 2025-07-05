@extends('layouts.app')
@section('title','Apply Doctor')
@section('page.title','Store Doctor Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill The Data</h4>
        </div>
        <div class="content">
            <form action="{{route('doctor.store')}}" method="post">
                @csrf
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
                        <label for="licenseNumberStore">License Number</label>
                        <input type="text" name="license_number" id="licenseNumberStore" required>
                        @error('license_number')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="specializationStore">Specialization</label>
                    <select name="specialization" id="specializationStore" required>
                        <option selected disabled>-- Please Select --</option>
                        <optgroup label="Primary Care Specialties">
                            <option value="Family Medicine">Family Medicine</option>
                            <option value="Internal Medicine">Internal Medicine</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Geriatrics">Geriatrics</option>
                        </optgroup>
                        <optgroup label="Surgical Specialties">
                            <option value="General Surgery">General Surgery</option>
                            <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                            <option value="Cardiothoracic Surgery">Cardiothoracic Surgery</option>
                            <option value="Neurosurgery">Neurosurgery</option>
                            <option value="Plastic Surgery">Plastic Surgery</option>
                        </optgroup>
                        <optgroup label="Medical Specialties">
                            <option value="Cardiology">Cardiology</option>
                            <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                            <option value="Gastroenterology">Gastroenterology</option>
                            <option value="Pulmonology">Pulmonology</option>
                            <option value="Endocrinology">Endocrinology</option>
                            <option value="Nephrology">Nephrology</option>
                        </optgroup>
                        <optgroup label="Diagnostic Specialties">
                            <option value="Radiology">Radiology</option>
                            <option value="Pathology">Pathology</option>
                        </optgroup>
                        <optgroup label="Other Common Specialties">
                            <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Psychiatry">Psychiatry</option>
                        </optgroup>
                    </select>
                    @error('specialization')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="callStore">Call Hours</label>
                        <input type="text" name="call_hours" id="callStore" required>
                        @error('call_hours')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="availableStore">Available Hours</label>
                        <input type="text" name="available_hours" id="availableStore" required>
                        @error('available_hours')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="qualificationsStore">Qualifications</label>
                    <textarea name="qualifications" id="qualificationsStore"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('doctors-center').classList.add('active');
    </script>
@endsection
