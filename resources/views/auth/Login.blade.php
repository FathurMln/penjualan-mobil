<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminLTE 4 | Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Login Page">
    @include('Layouts.styles') <!-- Required Plugin (AdminLTE) -->
</head>

<body class="login-page bg-body-secondary d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="login-box">
        <!-- Logo -->
        <div class="login-logo">
            <b>AdminLTE</b>
        </div>
        
        <!-- Card Container -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Masuk ke akun anda</p>

                <!-- Alert Messages -->
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('loginproccess') }}" method="POST">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group mb-3">
                        <div class="form-floating w-100">
                            <input type="email" name="email" id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email</label>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="input-group mb-3">
                        <div class="form-floating w-100">
                            <input type="password" name="password" id="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('Layouts.Scirpts') <!-- Required Scripts -->

</body>
</html>
