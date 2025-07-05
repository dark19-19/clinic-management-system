<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- CSS links or style tags go here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    @vite('resources/css/auth.css')
</head>
<body>
<form method="post" action="{{route('user.login')}}" class="auth-form">
    @csrf
    <div class="form-title">
        <h2>Login</h2>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div style="color: red;">
        @error('email')
        {{$message}}
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
    </div>
    <div style="color: red;">
        @error('password')
        {{$message}}
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <div class="foot form-text">
        Don't have an account? <a href="{{route('register')}}" class="form-way">Register</a>
    </div>
</form>
</body>
</html>
