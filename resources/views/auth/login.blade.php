@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="w-100" style="max-width: 400px;">
        <h2 class="mb-4 fw-bold text-center">Sign in to DesignHive</h2>

         <a href="" class="btn btn-outline-dark w-100 mb-3 d-flex align-items-center justify-content-center" style="border-radius: 14px;
    border-color: var(--bs-light-border-subtle) !important;">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="me-2" width="20">
            Sign in with Google
        </a> 
        <div class="text-center text-muted mb-3">or sign in with email</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Username or Email</label>
                <input id="email" type="email" class="form-control rounded-3 border-light-subtle @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <span class="invalid-feedback d-block mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <label for="password" class="form-label fw-semibold mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small text-decoration-none">Forgot?</a>
                @endif
            </div>

            <div class="mb-3">
                <input id="password" type="password" class="form-control rounded-3 border-light-subtle @error('password') is-invalid @enderror"
                    name="password" required>

                @error('password')
                    <span class="invalid-feedback d-block mt-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-dark w-100 rounded-4 py-2">Sign In</button>

            <div class="text-center mt-4">
                <small>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a></small>
            </div>
        </form>
    </div>
</div>
@endsection
