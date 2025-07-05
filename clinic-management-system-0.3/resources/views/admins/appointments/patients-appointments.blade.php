@extends('layouts.app')
@section('title','Patients Appointments')
@section('page.title','Patients Appointments')
@section('content')
    <div class="card" style="min-height: 62vh">
        <div class="title">
            <h4>Patients Appointments To Be Checked</h4>
        </div>
        <div class="content">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Reason</th>
                    <th>Notes</th>
                    <th>Canceled At</th>
                    <th>Quick Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{$appointment->patient->first_name . ' ' . $appointment->patient->last_name}}</td>
                        @if(isset($appointment->doctor))
                        <td>{{$appointment->doctor->first_name . ' ' . $appointment->doctor->last_name}}</td>
                        @else
                            <td>None</td>
                        @endif
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->start_time . ' - ' . $appointment->end_time}}</td>
                        <td>{{$appointment->status}}</td>
                        <td>{{$appointment->reason}}</td>
                        <td>{{$appointment->notes}}</td>
                        @if($appointment->canceled_at != null)
                            <td>{{$appointment->canceled_at}}</td>
                        @else
                            <td>Active</td>
                        @endif
                        <td class="quick-actions flex flex-row">
                            <a href="{{route('patient.appointment.accept', $appointment->id)}}" style="fill: var(--success); color: var(--success); font-size: 11px">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                                </svg>
                                Approve
                            </a>
                            <a href="#" style="fill: var(--warning); color: var(--warning); font-size: 14px" onclick="event.preventDefault(); document.getElementById('reject-form-{{$appointment->id}}').submit();">
                                @method('patch')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                                </svg>
                                Reject
                            </a>
                            <a href="#" style="fill: var(--danger); color: var(--danger); font-size: 12px"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$appointment->id}}').submit();">
                                @method('delete')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                    <path
                                        d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                </svg>
                                Delete
                            </a>
                            <form id="delete-form-{{$appointment->id}}" action="{{route('patient.appointment.delete',$appointment->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <form id="reject-form-{{$appointment->id}}" action="{{route('patient.appointment.reject', $appointment->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('appointments-center').classList.add('active');
    </script>
@endsection
