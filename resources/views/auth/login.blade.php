@extends('layouts.auth')

@section('title', 'Sign Up')

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

<div class="container-lg auth-container">
    <div class="row justify-content-center align-items-center">
        <!-- Registration Form Column -->
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8 col-sm-10 registration-column">
            <div class="card custom-card">
                <div class="card-body p-4 p-md-5">

                    @if (session()->has('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert"></div>
                            {{ session()->get('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                 <img src="{{ asset('assets/images/brand-logos/logo-dark.png') }}" alt="Logo" class="mb-3" style="max-width: 50px;">
                        <p class="h5 fw-semibold mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back !</p>
                        @if (session()->has('status'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session()->get('status') }}
                            </div>
                        @endif

                        <div class="alert alert-danger d-flex align-items-center" id="alert-danger" role="alert">
                            <svg class="flex-shrink-0 me-2 svg-danger" xmlns="http://www.w3.org/2000/svg"
                                enable-background="new 0 0 24 24" height="1.5rem" viewBox="0 0 24 24" width="1.5rem"
                                fill="#000000">
                                <g>
                                    <rect fill="none" height="24" width="24" />
                                </g>
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M15.73,3H8.27L3,8.27v7.46L8.27,21h7.46L21,15.73V8.27L15.73,3z M19,14.9L14.9,19H9.1L5,14.9V9.1L9.1,5h5.8L19,9.1V14.9z" />
                                            <rect height="6" width="2" x="11" y="7" />
                                            <rect height="2" width="2" x="11" y="15" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <div id="error"></div>
                        </div>

                        <form class="theme-form needs-validation" id="login_form" novalidate>
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12 ">
                                    <label for="signin-username" class="form-label text-default">Email ID</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Email Address" tabindex="1" required />
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Password
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="float-end text-danger">Forget
                                                password ?</a>
                                        @endif
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg" id="password"
                                            name="password" placeholder="Password" tabindex="2" required />
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('password',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input"
                                                id="defaultCheck1" tabindex="3">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                Remember password ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="button" id="btnlogin" class="btn btn-default btn-lg shadow-sm w-100"
                                        tabindex="4"> Sign In
                                        <div class="lds-ring" id="spinner">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">Dont have an account? <a href="{{ route('register') }}"
                                    class="text-primary">Sign Up</a></p>
                        </div>
                </div>
        </div>
    </div>

        <!-- Advert Container: Only visible on desktop view -->
        <div class="col-xxl-5 col-xl-5 col-lg-5 d-none d-lg-flex">
            <div class="advert-container">
                <img src="{{ asset('assets/images/verify-bank.jpg') }}" alt="Special Offer">
                <h4 class="mt-2">Special Offer!</h4>
                <p class="text-center">Join now and get exclusive access to our premium features. Don't miss out on our limited-time welcome bonus for new users!</p>
            </div>
        </div>
    </div>
</div>

@endsection
@push('page-js')
    <script src="{{ asset('assets/js/auth.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
@endpush