@auth()
    <nav>
        <div class="nav-main">
            <span class="navbar-brand nav-page-title">@yield('page.title')</span>
            @if(auth()->user()->role_id != 6)
                <ul class="nav nav-tabs">
                    @if(auth()->user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.dashboard')}}" id="dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="patients-center">
                                    Patients
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('patient.index')}}">Patients Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('patient.create')}}">Store Patient Data</a></li>
                                    <li><a class="dropdown-item" href="{{route('patient.find')}}">Update Patient Data</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="doctors-center">
                                    Doctors
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('doctor.index')}}">Doctors Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('doctor.create')}}">Store Doctor Data</a></li>
                                    <li><a class="dropdown-item" href="{{route('doctor.find')}}">Update Doctor Data</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="staff-center">
                                    Staff
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('staff.index')}}">Staff Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('staff.create')}}">Store Staff Data</a></li>
                                    <li><a class="dropdown-item" href="{{route('staff.find')}}">Update Staff Data</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="pharma-center">
                                    Pharmacists
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('pharma.index')}}">Pharmacists Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('pharma.create')}}">Store Pharmacist Data</a></li>
                                    <li><a class="dropdown-item" href="{{route('pharma.find')}}">Update Pharmacist Data</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="appointments-center">
                                    Appointments
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('patient.appointment.index')}}">Patients Appointments</a></li>
                                    <li><a class="dropdown-item" href="{{route('user.appointment.index')}}">Users Appointments</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.record.index')}}" class="nav-link" id="records-center">Medical Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('prescription.index')}}" id="prescriptions-center">Prescriptions</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="payments-center">
                                    Payments
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('payment.index')}}">Payments Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('payment.create')}}">Log A Payment</a></li>
                                    <li><a class="dropdown-item" href="{{route('payment.find')}}">Search Payment</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="medicines-center">
                                    Medicines
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('medicine.index')}}">Medicines Center</a></li>
                                    <li><a class="dropdown-item" href="{{route('medicine.create')}}">Store Medicine</a></li>
                                    <li><a class="dropdown-item" href="{{route('medicine.find')}}">Search Medicine</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.log')}}" class="nav-link" id="logs-center">Log History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
        <div class="dropdown user">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->name}}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form action="{{route('user.logout')}}" method="post" style="display: none;"
                      id="logout-form">@csrf</form>
            </ul>
        </div>

        @endauth
    </nav>
