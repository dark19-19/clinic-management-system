@extends('layouts.app')
@section('title','Edit Data')
@section('page.title','Edit Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Edit Data</h4>
        </div>
        <div class="content">
            <form action="{{route('staff.update', $employee->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="addressUpdate">Address</label>
                    <input type="text" name="address" id="addressUpdate" value="{{$employee->address ?? ''}}">
                    <div class="validation-error">
                        @error('address')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="workHoursUpdate">Work Hours</label>
                    <input type="text" name="work_hours" id="workHoursUpdate" value="{{$employee->work_hours ?? ''}}">
                    <div class="validation-error">
                        @error('work_hours')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="specializationUpdate">Specialization</label>
                    <select name="specialization" id="specializationUpdate">
                        <option value="" disabled selected>-- Select If You Want To Change --</option>
                        <option value="receptionist">Receptionist</option>
                        <option value="cashier">Cashier</option>
                        <option value="storage_worker">Storage Worker</option>
                        <option value="data_manager">Data Manager</option>
                    </select>
                    <div class="validation-error">
                        @error('specialization')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="qualificationsUpdate">Qualifications</label>
                    <textarea name="qualifications"
                              id="qualificationsUpdate">{{$employee->qualificaiotins ?? ''}}</textarea>
                    <div class="validation-error">
                        @error('qualifications')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('staff-center').classList.add('active');
    </script>
@endsection
