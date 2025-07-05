@extends('layouts.app')
@section('title', 'Prescriptions')
@section('page.title','Prescriptions')
@section('content')
    <div class="card" style="min-height: 70vh">
        <div class="title">
            <h4>Patients Prescriptions</h4>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Appointment Date</th>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Duration</th>
                        <th>Instructions</th>
                        <th>Quick Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($prescs))
                        @foreach($prescs as $presc)
                            <tr>
                                <td>{{$presc->medicalRecord->patient->first_name . ' ' . $presc->medicalRecord->patient->last_name}}</td>
                                <td>{{$presc->medicalRecord->doctor->first_name . ' ' . $presc->medicalRecord->doctor->last_name}}</td>
                                <td>{{$presc->medicalRecord->appointment->date}}</td>
                                <td>{{$presc->medicine->name}}</td>
                                <td>{{$presc->dosage}}</td>
                                <td>{{$presc->frequency}}</td>
                                <td>{{$presc->duration}}</td>
                                <td>{{$presc->instructions}}</td>
                                <td class="quick-actions flex flex-row"></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('prescriptions-center').classList.add('active');
    </script>
@endsection
