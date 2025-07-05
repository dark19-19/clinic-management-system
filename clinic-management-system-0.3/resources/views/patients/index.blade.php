@extends('layouts.app')
@section('title','Patient Center')
@section('page.title', 'Patient Center')
@section('content')
    @if($patientData['birth_date'] == null)
        <div class="card">
            <div class="title">
                <h4>Store your data as a patient.</h4>
            </div>
            <div class="content">
                <form method="post" action="{{route('patient.store')}}">
                    @csrf
                    <div class="form-row">
                        <label for="birthDateStore">Birth Date</label>
                        <input type="date" name="birth_date" id="birthDateStore" required>
                    </div>
                    <div class="form-row">
                        <label for="genderStore">Gender</label>
                        <select name="gender" id="genderStore" required>
                            <option value="" selected disabled>-- Please select --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unknown" selected>Prefer not to say</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="addressStore">Address</label>
                        <input type="text" name="address" id="addressStore" required>
                    </div>
                    <div class="form-row">
                        <label for="bloodGroupStore">Blood group</label>
                        <select name="blood_group" id="bloodGroupStore">
                            <option value="" selected disabled>-- Please select --</option>
                            <option value="A+">A+</option>
                            <option value="B+">b+</option>
                            <option value="AB+" selected>AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="medicalHistoryStore">Medical History</label>
                        <textarea name="medical_history" id="medicalHistoryStore"></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <div class="title">
                <h4>Your Data</h4>
            </div>
            <div class="content">
                <table>
                    <thead>
                    <tr>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Blood Group</th>
                        <th>Medical History</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$patientData['birth_date']}}</td>
                        <td>{{$patientData['gender']}}</td>
                        <td>{{$patientData['address']}}</td>
                        <td>{{$patientData['blood_group']}}</td>
                        <td>{{$patientData['medical_history']}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="foot">
                    If you have any problem with your data you can <a href="{{route('patient.edit')}}">change it</a>.
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="title">
            <h4>Upcoming appointments</h4>
        </div>
        <div class="content">
            @if($upcomingAppointments == [])
                <div class="empty-table">
                    You don't have any upcoming appointments.
                </div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Booked at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($upcomingAppointments as $appointment)
                        <tr>
                            <td>{{$appointment['date']}}}</td>
                            <td>{{$appointment['status']}}</td>
                            <td>{{date_format($appointment['created_at'],'Y-m-d H:i')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <div class="foot">
                Go check your <a href="#">appointments</a>.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="title">
            <h4>Quick Actions</h4>
        </div>
        <div class="content quick-actions">
            <a class="action action1" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                </svg>
                <span>Book Appointment</span>
            </a>
            <a class="action action2" href="{{route('patient.edit')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                </svg>
                <span>Update Data</span>
            </a>
            <a class="action action3" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l293.1 0c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1l-91.4 0zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/>
                </svg>
                <span>Update Profile</span>
            </a>
            <a class="action action4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                </svg>
                <span>Contact Us</span>
            </a>
            <a class="action action5" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M364.2 83.8c-24.4-24.4-64-24.4-88.4 0l-184 184c-42.1 42.1-42.1 110.3 0 152.4s110.3 42.1 152.4 0l152-152c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-152 152c-64 64-167.6 64-231.6 0s-64-167.6 0-231.6l184-184c46.3-46.3 121.3-46.3 167.6 0s46.3 121.3 0 167.6l-176 176c-28.6 28.6-75 28.6-103.6 0s-28.6-75 0-103.6l144-144c10.9-10.9 28.7-10.9 39.6 0s10.9 28.7 0 39.6l-144 144c-6.7 6.7-6.7 17.7 0 24.4s17.7 6.7 24.4 0l176-176c24.4-24.4 24.4-64 0-88.4z"/>
                </svg>
                <span>See Prescriptions</span>
            </a>
        </div>
    </div>
    <div class="card emergency">
        <div class="title">
            <h4>Emergency Contacts</h4>
        </div>
        <div class="content">
            <div class="contact-box">
                <h5>Clinic emergency line</h5>
                <p>(555) 996-9596</p>
                <p class="call-hours">Call hours: 24/7 Available</p>
            </div>
            <div class="contact-box">
                <h5>General emergency doctor</h5>
                <p>+1 967 995 932</p>
                <p class="call-hours">Call hours: 12PM -> 12AM Available</p>
            </div>
            <div class="contact-box">
                <h5>General emergency nurse</h5>
                <p>+1 996 977 988</p>
                <p class="call-hours">Call hours: 3AM -> 3PM Available</p>
            </div>
        </div>
    </div>
@endsection
