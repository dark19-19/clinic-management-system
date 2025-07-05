@extends('layouts.app')
@section('title','Doctor Center')
@section('page.title','Doctor Center')
@section('content')
    <div class="card">
        @if($doctor['doc_id'] == '')
        <div class="title">
            <h4>Store your data, doctor.</h4>
        </div>
            <div class="content">
                <form method="post" action="{{route('doctor.store')}}">
                    @csrf
                    @method('post')
                    <div class="form-row">
                        <label for="specializationStore">Specialization</label>
                        <select id="specializationStore" name="specialization" required>
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
                    </div>
                    <div class="form-row">
                        <label for="licenseNumberStore">License Number</label>
                        <input type="text" name="license_number" id="licenseNumberStore" required>
                    </div>
                    <div class="form-row">
                        <label for="qualificationsStore">Qualifications</label>
                        <input type="text" name="qualifications" id="qualificationsStore">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        @else
            <div class="title">
                <h4>Your Data</h4>
            </div>
            <div class="content">
                <table>
                    <thead>
                    <tr>
                        <th>Doctor ID</th>
                        <th>Specialization</th>
                        <th>License Number</th>
                        <th>Qualifications</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$doctor['doc_id']}}</td>
                        <td>{{$doctor['specialization']}}</td>
                        <td>{{$doctor['license_number']}}</td>
                        <td>{{$doctor['qualifications']}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="foot">
                    If you have any problem with your data you can <a href="">change it</a>.
                </div>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="title">
            <h4>Today's Appointments</h4>
        </div>
        <div class="content">
            @if($todayAppointments->count() == 0)
                <div class="empty-table">
                    You don't have any appointments today.
                </div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Booked at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todayAppointments as $appointment)
                        <tr>
                            <td>{{$appointment['patient_name']}}</td>
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
            <h4>Last Week Prescriptions Made</h4>
        </div>
        <div class="content">
            @if($lastWeekPrescriptions->count() == 0)
                <div class="empty-table">
                    There is no prescriptions made the last week.
                </div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Medicines</th>
                        <th>Made at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lastWeekPrescriptions as $prescription)
                        <tr>
                            <td>{{$prescription['patient_name']}}</td>
                            <td>{{$prescription['medicines']}}}</td>
                            <td>{{$appointment['created_at']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            <div class="foot">
                <a href="#">Show all</a>.
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
                        d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                </svg>
                <span>Make a prescription</span>
            </a>
            <a class="action action2" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                </svg>
                <span>Search for patient</span>
            </a>
            <a class="action action3" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l44.9 74.7c-16.1 17.6-28.6 38.5-36.6 61.5c-1.9-1.8-3.5-3.9-4.9-6.3L232 256.9 232 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6l0 6.4c0 8.8 7.2 16 16 16s16-7.2 16-16l0-6.4c0-5.3 4.3-9.6 9.6-9.6l40.5 0c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2l0 14.8c0 8.8 7.2 16 16 16s16-7.2 16-16l0-5.1 23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9l-40.5 0c-23 0-41.6 18.6-41.6 41.6z"/>
                </svg>
                <span>Request appointment</span>
            </a>
            <a class="action action4" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M0 96C0 43 43 0 96 0L384 0l32 0c17.7 0 32 14.3 32 32l0 320c0 17.7-14.3 32-32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32 0L96 512c-53 0-96-43-96-96L0 96zM64 416c0 17.7 14.3 32 32 32l256 0 0-64L96 384c-17.7 0-32 14.3-32 32zM208 112l0 48-48 0c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-48 48 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-48 0 0-48c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/>
                </svg>
                <span>View records</span>
            </a>
            <a class="action action5" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M112 96c-26.5 0-48 21.5-48 48l0 112 96 0 0-112c0-26.5-21.5-48-48-48zM0 144C0 82.1 50.1 32 112 32s112 50.1 112 112l0 224c0 61.9-50.1 112-112 112S0 429.9 0 368L0 144zM554.9 399.4c-7.1 12.3-23.7 13.1-33.8 3.1L333.5 214.9c-10-10-9.3-26.7 3.1-33.8C360 167.7 387.1 160 416 160c88.4 0 160 71.6 160 160c0 28.9-7.7 56-21.1 79.4zm-59.5 59.5C472 472.3 444.9 480 416 480c-88.4 0-160-71.6-160-160c0-28.9 7.7-56 21.1-79.4c7.1-12.3 23.7-13.1 33.8-3.1L498.5 425.1c10 10 9.3 26.7-3.1 33.8z"/>
                </svg>
                <span>Drug database</span>
            </a>
        </div>
    </div>
@endsection
