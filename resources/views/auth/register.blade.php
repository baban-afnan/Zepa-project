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

                    <div class="text-center mb-4">
                         <img src="{{ asset('assets/images/brand-logos/logo-dark.png') }}" alt="Logo" class="mb-3" style="max-width: 50px;">
                        <p class="h5 fw-semibold mb-2">Sign Up</p>
                        <p class="text-muted">Welcome & Join us by creating a free account!</p>
                    </div>
                    
                    <div class="alert alert-danger d-flex align-items-center fade show" id="alert-danger" role="alert">
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
                    
                    <form class="needs-validation" id="register_form" novalidate>
                        @csrf
                        <div class="row gy-3">
                            <div class="col-12">
                                <label for="signup-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    placeholder="e.g email@gmail.com" tabindex="1" required />
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="signup-password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Password" tabindex="3" required />
                                    <button class="btn btn-light" onclick="createpassword('password',this)"
                                        type="button" id="button-addon2">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">
                                    Please provide a password.
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="signup-confirmpassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Confirm password" tabindex="4" required />
                                    <button class="btn btn-light" onclick="createpassword('password_confirmation',this)"
                                        type="button" id="button-addon21">
                                        <i class="ri-eye-off-line align-middle"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">
                                    Please confirm your password.
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="signup-firstname" class="form-label">
                                    Referral Code
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                        title="Were you referred by someone? Enter their referral code below"
                                        data-bs-custom-class="tooltip-secondary">
                                        <i class="ri-information-line ms-1"></i>
                                    </a>
                                </label>
                                <input type="text" class="form-control form-control-lg" id="referral_code"
                                    name="referral_code" maxlength="6" placeholder="Idris19209" tabindex="2" />
                            </div>
                            
                            <div class="col-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="terms"
                                        name="terms" tabindex="5" required style="accent-color: #0d6efd; width: 18px; height: 18px;">
                                    <label class="form-check-label text-muted" for="terms">
                                        By creating an account you agree to our <a href="{{ route('terms') }}"
                                            class="text-primary text-decoration-underline fw-semibold">Terms & Conditions</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree to the terms and conditions.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid mt-3">
                                <button class="btn btn-default btn-lg shadow-sm w-100" id="register" type="button">
                                    <span id="button-text">Create Account</span>
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
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">Already have an account? 
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Advert Container: Only visible on desktop view -->
        <div class="col-xxl-5 col-xl-5 col-lg-5 d-none d-lg-flex">
            <div class="advert-container">
                <img src="{{ asset('assets/images/authentication/reg.png') }}" alt="Special Offer">
                <h4 class="mt-2">Special Offer!</h4>
                <p class="text-center">Join now and get exclusive access to our premium features. Don't miss out on our limited-time welcome bonus for new users!</p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-js')
<script src="{{ asset('assets/js/register.js') }}"></script>
<script src="{{ asset('assets/js/validation2.js') }}"></script>
@endpush