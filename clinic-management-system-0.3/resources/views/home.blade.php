@extends('layouts.app')
@section('title','Home')
@section('page.title','Home Page')
@section('content')
    <div class="card">
        <div class="title">
            <h4>The importance of clinics in medical care</h4>
        </div>
        <div class="content">
            <article>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                        <path
                            d="M320 368c0 59.5 29.5 112.1 74.8 144l-266.7 0c-35.3 0-64-28.7-64-64l0-160.4-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L522.1 193.9c-8.5-1.3-17.3-1.9-26.1-1.9c-54.7 0-103.5 24.9-135.8 64L320 256l0-48c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16l0 48-48 0c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l48 0 0 48c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16zm32 0a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L480 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z"/>
                    </svg>
                </div>
                Clinics play a vital role in providing accessible and affordable healthcare to communities. They offer
                primary care services, including diagnosis, treatment, and preventive care. Early detection of diseases
                through regular check-ups can save lives. Clinics reduce the burden on hospitals by handling
                non-emergency cases efficiently. They provide vaccinations, maternal care, and chronic disease
                management. Many clinics serve underserved areas, ensuring healthcare reaches everyone. Skilled doctors
                and nurses deliver personalized care in clinics. Timely medical attention prevents minor illnesses from
                becoming severe. Affordable services make clinics essential for low-income families. Investing in
                clinics strengthens public health and promotes well-being for all.
            </article>
        </div>
    </div>
    @auth()
        @if(auth()->user()->userAppointment()->count() == 0)
            <div class="card">
                <div class="title">
                    <h4>Request an appointment</h4>
                </div>
                <div class="content">
                    <form action="{{route('user.appointment.store')}}" method="post">
                        @csrf
                        @method('post')
                        @error('date')
                        {{$message}}
                        @enderror
                        <div class="form-row">
                            <label for="dateStore">Date</label>
                            <input type="date" name="date" id="dateStore" required>
                        </div>
                        <div class="form-row">
                            <label for="startTimeStore">Start Time</label>
                            <input type="time" name="start_time" id="startTimeStore" required>
                        </div>
                        <div class="form-row">
                            <label for="endTimeStore">End Time</label>
                            <input type="time" name="end_time" id="endTimeStore" required>
                        </div>
                        <div class="form-row">
                            <label for="reasonStore">Reason</label>
                            <input type="text" name="reason" id="reasonStore" required>
                        </div>
                        <div class="form-row">
                            <label for="notesStore">Notes</label>
                            <textarea name="notes" id="notesStore"></textarea>
                        </div>
                        <button type="submit">Request</button>
                    </form>
                </div>
            </div>
        @else
            <div class="card">
                <div class="title">
                    <h4>Appointment to go</h4>
                </div>
                <div class="content">
                    <table>
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Quick Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$userAppointment->date}}</td>
                            <td>{{$userAppointment->start_time}} -> {{$userAppointment->end_time}}</td>
                            <td>{{$userAppointment->reason}}</td>
                            <td>{{$userAppointment->status}}</td>
                            <td>{{$userAppointment->notes}}</td>
                            <td class="quick-actions flex flex-row">
                                <a href="#" style="fill: var(--danger); color: var(--danger); font-size: 16px"
                                   onclick="event.preventDefault(); document.getElementById('cancel-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                                    </svg>
                                    Cancel
                                </a>
                                <form action="{{route('user.appointment.cancel', $userAppointment->id)}}" method="post"
                                      style="display: none" id="cancel-form">
                                    @csrf
                                    @method('PATCH')
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endauth
    <div class="card">
        <div class="title">
            <h4>FAQs</h4>
        </div>
        <div class="content">
            <ul class="faq-list">
                <li class="faq-item">
                    <div class="question">
                        How can patients access the main content of our website?
                        <ul class="answer-list">
                            <li class="answer-row">
                                Register in our website.
                            </li>
                            <li class="answer-row">
                                Go and visit our center to store your data as a patient.
                            </li>
                            <li class="answer-row">
                                Login in our website.
                            </li>
                            <li class="answer-row">
                                Get access to all of our features.
                            </li>
                        </ul>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path
                            d="M112 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm40 304l0 128c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-223.1L59.4 304.5c-9.1 15.1-28.8 20-43.9 10.9s-20-28.8-10.9-43.9l58.3-97c17.4-28.9 48.6-46.6 82.3-46.6l29.7 0c33.7 0 64.9 17.7 82.3 46.6l44.9 74.7c-16.1 17.6-28.6 38.5-36.6 61.5c-1.9-1.8-3.5-3.9-4.9-6.3L232 256.9 232 480c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-128-16 0zM432 224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm0 240a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM368 321.6l0 6.4c0 8.8 7.2 16 16 16s16-7.2 16-16l0-6.4c0-5.3 4.3-9.6 9.6-9.6l40.5 0c7.7 0 13.9 6.2 13.9 13.9c0 5.2-2.9 9.9-7.4 12.3l-32 16.8c-5.3 2.8-8.6 8.2-8.6 14.2l0 14.8c0 8.8 7.2 16 16 16s16-7.2 16-16l0-5.1 23.5-12.3c15.1-7.9 24.5-23.6 24.5-40.6c0-25.4-20.6-45.9-45.9-45.9l-40.5 0c-23 0-41.6 18.6-41.6 41.6z"/>
                    </svg>
                </li>
                <li class="faq-item">
                    <div class="question">
                        How can patients book appointments?
                        <ul class="answer-list">
                            <li class="answer-row">
                                Log in and click "Appointments" at the navigation bar.
                            </li>
                            <li class="answer-row">
                                Select: Preferred doctor, date form available slots.
                            </li>
                            <li class="answer-row">
                                Receive email confirmation.
                            </li>
                            <li class="answer-row">
                                Reschedule/cancel via "Appointments" tab.
                            </li>
                        </ul>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/>
                    </svg>
                </li>
                <li class="faq-item">
                    <div class="question">
                        How are prescriptions managed?
                        <ul class="answer-list">
                            <li class="answer-row">
                                Doctor creates prescription during consultation.
                            </li>
                            <li class="answer-row">
                                System checks for existing medicines, and it will be saved to patient's medical record.
                            </li>
                            <li class="answer-row">
                                Patients view/download prescriptions from their portal.
                            </li>
                        </ul>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path
                            d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM160 240c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 48 48 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-48 0 0 48c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-48-48 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l48 0 0-48z"/>
                    </svg>
                </li>
                <li class="faq-item">
                    <div class="question">
                        How is patient data secured?
                        <ul class="answer-list">
                            <li class="answer-row">
                                Encryption: AES-256 for data at rest, TLS 1.3 for data in transit.
                            </li>
                            <li class="answer-row">
                                Access Control: Role-based permissions (doctor/pharmacist/patient).
                            </li>
                            <li class="answer-row">
                                Audit Logs: Track all data access/changes.
                            </li>
                            <li class="answer-row">
                                Compliance: HIPAA/GDPR-ready architecture.
                            </li>
                            <li class="answer-row">
                                Regular penetration testing.
                            </li>
                        </ul>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/>
                    </svg>
                </li>
            </ul>
            <div class="foot">
                Do you want to know more about our application? <a href="#">Click Here</a>.
            </div>
        </div>
    </div>
@endsection
