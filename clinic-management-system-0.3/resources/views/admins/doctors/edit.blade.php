@extends('layouts.app')
@section('title','Edit Data')
@section('page.title','Edit Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Edit Data</h4>
        </div>
        <div class="content">
            <form action="{{route('doctor.update', $doctor->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="addressUpdate">Address</label>
                    <input type="text" name="address" id="addressUpdate" value="{{$doctor->address ?? ''}}">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="callUpdate">Call Hours</label>
                        <input type="text" name="call_hours" id="callUpdate" value="{{$doctor->call_hours ?? ''}}">
                        @error('call_hours')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="availableUpdate">Available Hours</label>
                        <input type="text" name="available_hours" id="availableUpdate" value="{{$doctor->available_hours ?? ''}}">
                        @error('available_hours')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="qualificationsUpdate">Qualifications</label>
                    <textarea name="qualifications" id="qualificationsUpdate">{{$doctor->qualifications ?? ''}}</textarea>
                    @error('qualifications')
                    {{$message}}
                    @enderror
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('doctors-center').classList.add('active');
    </script>
@endsection
