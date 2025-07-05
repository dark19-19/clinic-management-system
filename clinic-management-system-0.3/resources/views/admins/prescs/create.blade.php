@extends('layouts.app')
@section('title','Store Prescription')
@section('page.title','Store Prescription')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill The Data</h4>
        </div>
        <div class="content">
            <form action="{{route('prescription.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="medicalRecordStore">Medical Record</label>
                        <select name="medical_record_id" id="medicalRecordStore" required>
                            <option value="" selected disabled>-- Please Select --</option>
                            @if(isset($records))
                                @foreach($records as $record)
                                    <option value="{{$record->id}}">
                                        {{$record->patient->first_name . ' ' . $record->patient->last_name . ' - Dr. ' . $record->doctor->first_name . ' - '. $record->appointment->date . ' - ' . $record->daignosis}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="medicineList">Medicine</label>
                        <input list="medicines" name="medicine_id" placeholder="Search medicines..." id="medicineList" required>
                        <datalist id="medicines">
                            @if(isset($medicines))
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                @endforeach
                            @endif
                        </datalist>
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="dosageStore">Dosage</label>
                        <input type="text" name="dosage" id="dosageStore" required>
                        <div class="validation-error">
                            @error('dosage')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="frequencyStore">Frequency</label>
                        <input type="text" name="frequency" id="frequencyStore" required>
                        <div class="validation-error">
                            @error('frequency')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="durationStore">Duration</label>
                    <input type="text" name="duration" id="durationStore" required>
                    <div class="validation-error">
                        @error('duration')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="instructionsStore">Instructions</label>
                    <textarea name="instructions" id="instructionsStore" required></textarea>
                    <div class="validation-error">
                        @error('instructions')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('staff-center').classList.add('active');
    </script>
@endsection
