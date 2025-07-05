@extends('layouts.app')
@section('title','Edit Data')
@section('page.title','Edit Data')
@section('content')
    <div class="card" style="height: 70vh;">
        <div class="title">
            <h4>Edit Data</h4>
        </div>
        <div class="content">
            <form action="{{route('pharma.update', $pharmacist->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="addressUpdate">Address</label>
                    <input type="text" name="address" id="addressUpdate" value="{{$pharmacist->address ?? ''}}">
                    <div class="validation-error">
                        @error('address')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                        <label for="workHoursUpdate">Work Hours</label>
                        <input type="text" name="work_hours" id="workHoursUpdate" value="{{$pharmacist->work_hours ?? ''}}">
                        <div class="validation-error">
                            @error('work_hours')
                            {{$message}}
                            @enderror
                        </div>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('pharma-center').classList.add('active');
    </script>
@endsection
