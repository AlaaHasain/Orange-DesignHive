@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="w-100" style="max-width: 500px;">
        <h2 class="mb-4 fw-bold text-center">Sign up to DesignHive</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input id="name" type="text" class="form-control rounded-3 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                    <span class="invalid-feedback d-block mt-1"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input id="email" type="email" class="form-control rounded-3 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="invalid-feedback d-block mt-1"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input id="password" type="password" class="form-control rounded-3 @error('password') is-invalid @enderror"
                    name="password" required placeholder="6+ characters">
                @error('password')
                <span class="invalid-feedback d-block mt-1"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control rounded-3"
                    name="password_confirmation" required placeholder="Confirm your password">
            </div>


            <button type="submit" class="btn btn-dark w-100 rounded-pill py-2 fw-bold">Create Account</button>

            <div class="text-center mt-4">
                <small>Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Sign In</a></small>
            </div>

            <div class="text-muted text-center mt-3" style="font-size: 0.75rem;">
                This site is protected by reCAPTCHA and the Google <a href="#" class="text-decoration-underline">Privacy Policy</a> and <a href="#" class="text-decoration-underline">Terms of Service</a> apply.
            </div>
        </form>
    </div>
</div>
@endsection