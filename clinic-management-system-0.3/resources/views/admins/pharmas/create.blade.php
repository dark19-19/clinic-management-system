@extends('layouts.app')
@section('title','Store Staff')
@section('page.title','Store Staff Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill The Data</h4>
        </div>
        <div class="content">
            <form action="{{route('pharma.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="firstNameStore">First Name</label>
                        <input type="text" name="first_name" id="firstNameStore" required>
                        <div class="validation-error">
                            @error('first_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="lastNameStore">Last Name</label>
                        <input type="text" name="last_name" id="lastNameStore" required>
                        <div class="validation-error">
                            @error('last_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="emailStore">Email</label>
                    <input type="email" name="email" id="emailStore" required>
                    <div class="validation-error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="birthDateStore">Date Of Birth</label>
                        <input type="date" name="birth_date" id="birthDateStore" required>
                        <div class="validation-error">
                            @error('birth_date')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="genderStore">Gender</label>
                        <select name="gender" id="genderStore" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="validation-error">
                            @error('gender')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="addressStore">Address</label>
                    <input type="text" name="address" id="addressStore" required>
                    <div class="validation-error">
                        @error('address')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="phoneStore">Phone Number</label>
                        <input type="text" name="phone" id="phoneStore" required>
                        <div class="validation-error">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="licenseStore">License Number</label>
                        <input type="text" name="license_number" id="licenseStore">
                        <div class="validation-error">
                            @error('license_number')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="workHoursStore">Work Hours</label>
                    <input type="text" name="work_hours" id="workHoursStore" required>
                    <div class="validation-error">
                        @error('work_hours')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('pharma-center').classList.add('active');
    </script>
@endsection
