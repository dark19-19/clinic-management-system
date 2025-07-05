<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
</head>
<body>
<div class="message-container flex flex-center">
    <div class="message flex flex-col" style="fill: #4CAF50; color: #4CAF50;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width: 40px; height: 40px">
            <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
        </svg>
        <h3 class="fs-20">{{session('message')}}</h3>
    </div>
</div>
<script>
        // Countdown and redirect
        let seconds = {{ session('countdown', 5) }};

        const interval = setInterval(() => {
        seconds--;

        if (seconds <= 0) {
        clearInterval(interval);
        window.location.href = "{{ route(session('redirectRoute', 'admin.dashboard')) }}";
    }
    }, 1000);
</script>
</body>
</html>
