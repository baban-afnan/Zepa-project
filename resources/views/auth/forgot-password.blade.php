@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">
<link href="{{ asset('assets/css1/style1.css') }}" rel="stylesheet" id="style">
<style>
body {
    background: url("{{ asset('assets/images/authentication/background01.png') }}");
    background-size: cover;
    min-height: 100vh;
    margin: 0;
    padding: 0;
    box-shadow: 0 0 40px 0 rgba(0,0,0,0.08) inset;
}
</style>
<div class="auth-container">
    <div class="auth-card">
        <!-- Logo -->
        <div class="text-center mb-4">
            <a href="{{ route('login') }}">
                <img src="{{ asset('assets/images/brand-logos/logo-dark.png') }}" alt="Logo" class="auth-logo">
            </a>
            <h4 class="auth-title">Forgot Password?</h4>
            <p class="auth-description">
                Enter your email and we'll send you a password reset link.
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Password Reset Form -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" 
                       placeholder="Enter your email" required autofocus>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">
                    Send Password Reset Link
                </button>
            </div>
        </form>

        <div class="text-center mt-4">
            <p class="text-muted mb-0">
                Remember your password? <a href="{{ route('login') }}" class="text-primary">Sign In</a>
            </p>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script src="{{ asset('assets/js/passwordReset.js') }}"></script>
@endpush