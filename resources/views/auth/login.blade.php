<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        .login-image {
            background: url('images/loginimage.webp') no-repeat center center;
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Left: Image Section -->
        <div class="col-md-6 d-none d-md-block login-image">
        </div>

        <!-- Right: Form Section -->
        <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <div class="w-75">
                <h3 class="mb-4 text-center">Login</h3>

                <!-- Show Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Show Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">Forgot your password?</a>
                        @endif

                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
