<!-- resources/views/unauthorized.blade.php -->
@extends('layouts.app')
@section('page.title','Unauthorized')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md text-center">
            <div class="text-red-500 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Unauthorized Access</h2>
            <p class="text-gray-600 mb-6">{{ session('error', 'You do not have permission to view this page.') }}</p>

            <div class="mb-6">
                <p class="text-gray-500">Redirecting to dashboard in <span id="countdown">5</span> seconds...</p>
                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                    <div id="progress-bar" class="bg-blue-600 h-2.5 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <a href="{{ route(session('redirectRoute', 'user.home')) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Go to Dashboard Now
            </a>
        </div>
    </div>

    <script>
        // Countdown and redirect
        let seconds = {{ session('countdown', 5) }};
        const countdownEl = document.getElementById('countdown');
        const progressBar = document.getElementById('progress-bar');

        const interval = setInterval(() => {
            seconds--;
            countdownEl.textContent = seconds;
            progressBar.style.width = `${(seconds / {{ session('countdown', 5) }}) * 100}%`;

            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = "{{ route(session('redirectRoute', 'user.home')) }}";
            }
        }, 1000);
    </script>
@endsection
