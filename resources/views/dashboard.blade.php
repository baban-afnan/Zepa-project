@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="page">
        @include('components.app-header')
        @include('components.app-sidebar')

        <!-- CSS -->
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">

        <!-- Main Content -->
        <div class="main-content app-content">
            <div class="container-fluid">

            @php
    use Carbon\Carbon;

    $now = Carbon::now('Africa/Lagos');
    $hour = $now->hour;

    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Good morning';
        $icon = 'bi-sunrise'; // sunrise icon
        $color = 'text-warning';
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = 'Good afternoon';
        $icon = 'bi-sun'; // sun icon
        $color = 'text-orange'; // custom or defined in your CSS
    } else {
        $greeting = 'Good evening';
        $icon = 'bi-moon-stars'; // moon icon
        $color = 'text-primary';
    }
@endphp

<!-- Add Bootstrap Icons if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@if ($status == 'Pending')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        We're excited to have you on board! However, we need to verify your identity before activating your
        account. Simply click the link below to complete the verification process<br>
        <button type="button" class="btn btn-default btn-lg shadow-sm w-30" data-bs-toggle="modal" data-bs-target="#kycModal">
            Verify KYC Status
        </button>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('success') !!}
    </div>
@endif
<!-- End::page-header -->

<!-- Start::page-header --> 
<div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
    <div class="d-flex align-items-center gap-2">
        <i class="bi {{ $icon }} fs-3 {{ $color }}"></i>
        <p class="fw-semibold fs-18 mb-0">{{ $greeting }}, {{ Auth::user()->first_name }}!</p>
    </div>
</div>


                        

                 <!-- balance -->
           <div class="row my-4 text-center">
              <div class="col-12 d-flex align-items-center justify-content-center gap-2">
                <a href="{{ route('funding') }}" class="text-decoration-none">
                 <span class="avatar avatar-md avatar-rounded bg-primary-transparent">
                <i class="ti ti-wallet fs-16"></i>
             </span>
             </a>
              <h4 class="fw-light mb-0">&#x20A6;{{ $wallet_balance }}</h4>
             </div>
                <div class="col-12">
        <p class="text-secondary mt-2">Total Balance</p>
    </div>
</div>
 <!--end balance -->



                    <!-- income expense-->
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                                                <div class="icons bg-white text-white rounded-12">
                                                <a href="{{ route('claim') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-info-transparent">
                                                                <i class="ti ti-arrow-down fs-16"></i>
                                                            </span>
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h4 class="size-10 text-secondary mb-0">Unclaimed Bonus</h4>
                                           <h4>  &#x20A6;{{ $bonus_balance }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar avatar-40 p-1 shadow-sm shadow-danger rounded-15">
                                                <div class="icons bg-white text-white rounded-12">
                                                <a href="{{ route('transactions') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-info-transparent">
                                                                <i class="ti ti-arrow-up fs-16"></i>
                                                            </span>
                                                        </a>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h4 class="size-10 text-secondary mb-0">History</h4>
                                          <h4>  {{ number_format($transaction_count) }} </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <!--End income expense-->
                   



      <!-- categories list -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-theme text-white">
            <div class="card-body pb-0">
                <div class="d-flex flex-nowrap overflow-x-auto pb-3">
                    <div class="text-center flex-shrink-0" style="width: 25%">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal01">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                    <i class="bi bi-receipt-cutoff size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Pay</p>
                        </button>
                    </div>
                    <div class="text-center flex-shrink-0" style="width: 25%">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal02">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                    <i class="bi bi-arrow-up-right size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Send</p>
                        </button>
                    </div>
                    <div class="text-center flex-shrink-0" style="width: 25%">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal03">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                    <i class="bi bi-arrow-down-left size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Receive</p>
                        </button>
                    </div>
                    <div class="text-center flex-shrink-0" style="width: 25%">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal04">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                    <i class="bi bi-wallet size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Loan</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End categories list -->


<!-- Menu Modal 01 -->
<div class="modal fade" id="menumodal01" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4 position-relative">
                <!-- Close Button (Top Right) -->
                <button type="button" 
                        class="btn-close position-absolute top-0 end-0 m-3" 
                        data-bs-dismiss="modal" 
                        aria-label="Close"
                        style="font-size: 1.1rem; transition: all 0.2s ease;">
                </button>

                <!-- Header with logo and title -->
                <div class="d-flex align-items-center mb-4 pe-4">
                    <img src="assets/images/brand-logos/logo.png" alt="Company Logo" 
                         class="rounded-circle me-3 border border-2 border-light shadow-sm" 
                         style="width: 50px; height: 50px; object-fit: contain;">
                    <div>
                        <h2 class="mb-0">
                            <span class="text-primary fw-light">Payment</span>
                            <span class="fw-bold">Services</span>
                        </h2>
                        <p class="text-muted small mb-0">Quick and secure transactions</p>
                    </div>
                </div>

                <!-- Main Services Grid -->
                <div class="row g-3">
                    <!-- Row 1 -->
                    <div class="col-4 text-center">
                        <a href="{{ route('airtime') }}" class="btn btn-outline-danger rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-danger bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-receipt-cutoff size-24 text-danger"></i>
                            </div>
                            <span class="fw-medium small">Buy Airtime</span>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="{{ route('data') }}" class="btn btn-outline-primary rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-wifi size-24 text-primary"></i>
                            </div>
                            <span class="fw-medium small">Buy Data</span>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="{{ route('sme-data') }}" class="btn btn-outline-success rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-wifi size-24 text-success"></i>
                            </div>
                            <span class="fw-medium small">SME Data</span>
                        </a>
                    </div>

                    <!-- Row 2 -->
                    <div class="col-4 text-center">
                        <a href="#" class="btn btn-outline-secondary rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-secondary bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-lightning-fill size-24 text-secondary"></i>
                            </div>
                            <span class="fw-medium small">Electricity</span>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="#" class="btn btn-outline-warning rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-cash-stack size-24 text-warning"></i>
                            </div>
                            <span class="fw-medium small">Pay Bet</span>
                        </a>
                    </div>

                    <div class="col-4 text-center">
                        <a href="#" class="btn btn-outline-info rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-tv size-24 text-info"></i>
                            </div>
                            <span class="fw-medium small">TV Recharge</span>
                        </a>
                    </div>
                </div>

                <!-- More Services Section -->
                <h5 class="text-center mt-4 mb-3 text-uppercase fw-bold" style="color: #6c757d; letter-spacing: 1px;">More Services</h5>
                <div class="row g-3">
                    <div class="col-6 text-center">
                        <a href="#" class="btn btn-outline-secondary rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-secondary bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-credit-card size-24 text-secondary"></i>
                            </div>
                            <span class="fw-medium small">Donation Payment</span>
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="#" class="btn btn-outline-danger rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center service-btn">
                            <div class="bg-danger bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-building size-24 text-danger"></i>
                            </div>
                            <span class="fw-medium small">Loan Repayment</span>
                        </a>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4 pt-2">
                    <small class="text-muted">24/7 secure payment services</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 01 ends -->

<style>
    /* Enhanced styles for better appearance */
    .service-btn {
        transition: all 0.2s ease;
        border-width: 1.5px;
    }
    
    .service-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }
    
    .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }
    
    .modal-content {
        border-radius: 12px !important;
    }
    
    .rounded-circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>



    <!-- Menu Modal 02 -->
<div class="modal fade" id="menumodal02" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-body p-4">
                <!-- Header with logo and title -->

                  <!-- Close Button (Top Right) -->
                <button type="button" 
                        class="btn-close position-absolute top-0 end-0 m-3" 
                        data-bs-dismiss="modal" 
                        aria-label="Close"
                        style="font-size: 1.1rem; transition: all 0.2s ease;">
                </button>
                <div class="d-flex align-items-center mb-4">
                    <img src="assets/images/brand-logos/logo.png" alt="Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                    <div>
                        <h2 class="mb-0"><span class="text-primary fw-light">Quick</span> <span class="fw-bold">Actions</span></h2>
                        <p class="text-muted small mb-0">Instant transactions with Zepa</p>
                    </div>
                </div>

                <!-- Description -->
                <div class="text-center bg-light rounded-3 p-3 mb-4">
                    <p class="mb-0 text-dark">Send to Zepa for instant transactions<br>No fail, no error - 100% reliable</p>
                </div>

                <!-- Transfer Options -->
                <div class="row mb-4">
                    <div class="col-6 text-center mb-3">
                        <a href="{{ route('p2p') }}" class="btn btn-outline-danger rounded-4 p-3 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-arrow-down-right size-24 text-danger"></i>
                            </div>
                            <span class="fw-medium">Send to Zepa</span>
                        </a>
                    </div>
                    <div class="col-6 text-center mb-3">
                        <a href="{{ route('p2p') }}" class="btn btn-outline-primary rounded-4 p-3 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-arrow-up-right size-24 text-primary"></i>
                            </div>
                            <span class="fw-medium">Send to Bank</span>
                        </a>
                    </div>
                </div>

                <!-- Loan Options Section -->
                <h5 class="text-center mb-3 text-uppercase fw-bold" style="color: #6c757d; letter-spacing: 1px;">Loan Services</h5>
                <div class="row">
                    <!-- House/Pay Letter Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-house-check size-24 text-success"></i>
                            </div>
                            <span class="fw-medium small">House/Pay Letter</span>
                        </button>
                    </div>
                    
                    <!-- Business Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-briefcase size-24 text-info"></i>
                            </div>
                            <span class="fw-medium small">Business Loan</span>
                        </button>
                    </div>
                    
                    <!-- Personal Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-person-check size-24 text-warning"></i>
                            </div>
                            <span class="fw-medium small">Personal Loan</span>
                        </button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <small class="text-muted">Secure & reliable services</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 02 ends -->


<!-- Menu Modal 03 -->
<div class="modal fade" id="menumodal03" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body p-4">

           <!-- Close Button (Top Right) -->
                <button type="button" 
                        class="btn-close position-absolute top-0 end-0 m-3" 
                        data-bs-dismiss="modal" 
                        aria-label="Close"
                        style="font-size: 1.1rem; transition: all 0.2s ease;">
                </button>

                <!-- Header Section -->
                <div class="text-center mb-4">
                     <img src="assets/images/brand-logos/logo.png" alt="Logo" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                    <h2 class="fw-bold mb-1"><span class="text-primary">Virtual</span> Account</h2>
                    <p class="text-muted">Fund your wallet instantly using your dedicated virtual account</p>
                </div>

                @if ($virtual_funding->is_enabled)
                    <!-- Virtual Accounts List -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            @if ($virtual_accounts != null)
                                @foreach ($virtual_accounts as $data)
                                    <div class="card mb-3 border-0 shadow-sm">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center">
                                                <!-- Bank Logo -->
                                                <div class="flex-shrink-0 me-3">
                                                    @if ($data->bankName == 'Wema bank')
                                                        <img src="{{ asset('assets/images/wema.jpg') }}" alt="Wema Bank" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @elseif($data->bankName == 'Moniepoint Microfinance Bank')
                                                        <img src="{{ asset('assets/images/moniepoint.jpg') }}" alt="Moniepoint" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @elseif($data->bankName == 'PalmPay')
                                                        <img src="{{ asset('assets/images/palmpay.png') }}" alt="PalmPay" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('assets/images/sterling.png') }}" alt="Sterling Bank" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                
                                                <!-- Account Details -->
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-bold">{{ $data->accountName }}</h6>
                                                    <div class="d-flex align-items-center mb-1">
                                                        <span class="text-muted me-2">Account No:</span>
                                                        <span class="fw-semibold acctno">{{ $data->accountNo }}</span>
                                                    </div>
                                                    <div class="badge bg-light text-dark">
                                                        <i class="bi bi-bank me-1"></i> {{ $data->bankName }}
                                                    </div>
                                                </div>
                                                
                                                <!-- Copy Button -->
                                                <div class="flex-shrink-0 ms-3">
                                                    <button class="btn btn-outline-primary btn-sm copy-account-number" data-account="{{ $data->accountNo }}">
                                                        <i class="bi bi-clipboard me-1"></i> Copy
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @else
                    <!-- Disabled State -->
                    <div class="text-center py-4">
                        <div class="avatar avatar-lg bg-danger bg-opacity-10 rounded-circle mb-3">
                            <i class="bi bi-slash-circle-fill text-danger fs-1"></i>
                        </div>
                        <h5 class="fw-bold text-danger mb-2">Virtual Account Disabled</h5>
                        <p class="text-muted">This service is currently unavailable</p>
                    </div>
                @endif

                <!-- Support Section -->
                <div class="text-center mt-4">
                    <div class="alert alert-light border-danger border-opacity-25">
                        <i class="bi bi-exclamation-circle text-danger me-2"></i>
                        <small class="fw-semibold text-muted">
                            If your funds aren't received within 30 minutes, please 
                            <a href="{{ route('support') }}" class="text-decoration-underline">contact support
                                <i class="bi bi-headset ms-1"></i>
                            </a>
                        </small>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="text-center mt-3">
                    <button class="btn btn-light me-2">
                        <i class="bi bi-share me-1"></i> Share Account
                    </button>
                    <button class="btn btn-light">
                        <i class="bi bi-download me-1"></i> Save Details
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 03 ends -->

<script>
document.querySelectorAll('.copy-account-number').forEach(button => {
    button.addEventListener('click', function() {
        const accountNumber = this.getAttribute('data-account');
        navigator.clipboard.writeText(accountNumber).then(() => {
            // Change button text temporarily
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="bi bi-check-circle me-1"></i> Copied!';
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        });
    });
});
</script>



    <!-- Menu Modal 04 -->
<div class="modal fade" id="menumodal04" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-body p-4">
             <div class="header-with-close d-flex align-items-center justify-content-between mb-4 p-3 bg-light rounded">
    <!-- Logo and Title Section -->
    <div class="d-flex align-items-center">
        <img src="assets/images/brand-logos/logo.png" alt="Company Logo" 
             class="rounded-circle me-3" 
             style="width: 50px; height: 50px; object-fit: contain;">
        
        <div>
            <h2 class="mb-0">
                <span class="text-primary fw-light">Quick</span>
                <span class="fw-bold">Actions</span>
            </h2>
            <p class="text-muted small mb-0">Instant Loan with Zepa</p>
        </div>
    </div>
    
   <!-- Close Button (Top Right) -->
                <button type="button" 
                        class="btn-close position-absolute top-0 end-0 m-3" 
                        data-bs-dismiss="modal" 
                        aria-label="Close"
                        style="font-size: 1.1rem; transition: all 0.2s ease;">
                </button>
</div>

                <!-- Image Carousel -->
                <div class="text-center bg-light rounded-3 p-3 mb-4">
                    <img id="loan-carousel-img" src="{{ asset('assets/images/loan1.jpg') }}" alt="Loan Banner" class="img-fluid rounded mb-2" style="max-height: 180px;">
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const images = [
                            "{{ asset('assets/images/flags/001.jpg') }}",
                            "{{ asset('assets/images/flags/india_flag.jpg') }}",
                            "{{ asset('assets/images/loan3.jpg') }}",
                            "{{ asset('assets/images/loan4.jpg') }}",
                            "{{ asset('assets/images/loan5.jpg') }}"
                        ];
                        let idx = 0;
                        const imgElem = document.getElementById('loan-carousel-img');
                        setInterval(() => {
                            idx = (idx + 1) % images.length;
                            imgElem.src = images[idx];
                        }, 10000);
                    });
                </script>

                <!-- Transfer Options -->
                <div class="row mb-4">
                    <div class="col-6 text-center mb-3">
                        <a href="{{ route('p2p') }}" class="btn btn-outline-danger rounded-4 p-3 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-danger bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-bank size-24 text-danger"></i>
                            </div>
                            <span class="fw-medium">Apply For House Loan</span>
                        </a>
                    </div>
                    <div class="col-6 text-center mb-3">
                        <a href="{{ route('p2p') }}" class="btn btn-outline-primary rounded-4 p-3 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-bank size-24 text-primary"></i>
                            </div>
                            <span class="fw-medium">Apply for Land Loan</span>
                        </a>
                    </div>
                </div>

                <!-- Loan Options Section -->
                <h5 class="text-center mb-3 text-uppercase fw-bold" style="color: #6c757d; letter-spacing: 1px;">Loan Services</h5>
                <div class="row">
                    <!-- House/Pay Letter Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-house-check size-24 text-success"></i>
                            </div>
                            <span class="fw-medium small">House/Pay Letter</span>
                        </button>
                    </div>
                    
                    <!-- Business Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-info bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-briefcase size-24 text-info"></i>
                            </div>
                            <span class="fw-medium small">Business Loan</span>
                        </button>
                    </div>
                    
                    <!-- Personal Loan -->
                    <div class="col-4 text-center mb-3">
                        <button class="btn btn-light rounded-4 p-2 w-100 h-100 d-flex flex-column align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3 mb-2">
                                <i class="bi bi-person-check size-24 text-warning"></i>
                            </div>
                            <span class="fw-medium small">Personal Loan</span>
                        </button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <small class="text-muted">Secure & reliable services</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal 04 ends -->


  <!-- Start Transactions-->
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h5 class="mb-0 text-primary">Recent Transactions</h5>
                </div>
                <div class="card-body bg-white">
                    @if (!$transactions->isEmpty())
                        @php
                            $lastThreeTransactions = $transactions->take(3);
                            $serialNumber = 1;
                        @endphp
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-nowrap">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="text-center">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lastThreeTransactions as $transaction)
                                        @php
                                            $badgeColor = match($transaction->status) {
                                                'Approved' => 'primary',
                                                'Rejected' => 'danger',
                                                'Pending' => 'warning',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $serialNumber++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('F j, Y') }}</td>
                                            <td>{{ $transaction->service_type }}</td>
                                            <td>
                                                <span class="badge bg-{{ $badgeColor }}">
                                                    {{ $transaction->status }}
                                                </span>
                                            </td>
                                            <td>{{ $transaction->service_description }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <img src="{{ asset('assets/images/no-transaction.gif') }}" alt="No Transactions" class="img-fluid mb-3" style="max-width: 300px;">
                            <p class="fw-semibold fs-5">No Available Transactions</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- End transactions-->


    <!-- Start Our Services-->
    <div class="col-12">
    <div class="card custom-card shadow rounded-3 border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
            <h5 class="card-title mb-0 fw-bold text-dark">Our Services</h5>
        </div>
        <div class="card-body">
            <div class="row g-3 justify-content-center">

                @php
                    $services = [
                        ['route' => route('more-services', 'funding'), 'icon' => 'fund.png', 'title' => 'Fund Wallet'],
                        ['route' => route('more-services', 'transfer'), 'icon' => 'transfer.png', 'title' => 'Transfer'],
                        ['route' => route('airtime'), 'icon' => 'airtime.png', 'title' => 'Buy Airtime'],
                        ['route' => route('more-services', 'data'), 'icon' => 'data.png', 'title' => 'Buy Internet Data'],
                        ['route' => route('electricity'), 'icon' => 'electric.png', 'title' => 'Pay Electricity Bills'],
                        ['route' => route('tv'), 'icon' => 'tv.png', 'title' => 'Pay TV Subscription'],
                        ['route' => route('education'), 'icon' => 'education.png', 'title' => 'Educational Pin'],
                        ['route' => route('more-services', 'verifications'), 'icon' => 'identity.png', 'title' => 'Verification'],
                        ['route' => route('more-services', 'agency'), 'icon' => 'modify.png', 'title' => 'Agency Services'],
                       ];
                @endphp

                @foreach($services as $service)
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-center">
                        <a href="{{ $service['route'] }}" class="text-decoration-none">
                            <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}"
                                     class="mb-2 service-icon">
                                <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- End Our Services--> 

<!-- Blogs -->
<div class="row mb-3">
                <div class="col">
                    <h6 class="title">Bunus and Discount</h6>
                </div>
                <div class="col-auto align-self-center">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/images/p2p.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Fund Transfer </p>
                                    <ctions class="text-muted size-12">Save chargies and send money to zepa wallet for free and instant</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/images/network.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Buy Airtime</p>
                                    <p class="text-muted size-12">Buy Airtime and get instant 5% Discount</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="blogdetails.html" class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 coverimg">
                                        <img src="assets/images/bvn1.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-1">Get BVN enrolment Access</p>
                                    <p class="text-muted size-12">Upgrade Business and become bvn enrolment agent 
                                    today and get 200N commission per enrolment</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- main page content ends -->



 <!-- offers banner -->
 <div class="row mb-4">
                <div class="col-12">
                    <div class="card theme-bg overflow-hidden">
                        <figure class="m-0 p-0 position-absolute top-0 start-0 w-100 h-100 coverimg right-center-img">
                            <img src="assets/images/offerbg.png" alt="">
                        </figure>
                        <div class="card-body py-4">
                            <div class="row">
                                <div class="col-9 align-self-center">
                                    <h1 class="mb-3"><span class="fw-light text-white">15% OFF</span><br /><span class="fw-light text-white">GiftCard</h1></span>
                                    <p>Thank you for spending with us, You have received Gift Card.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <!--  end offers banner -->


         <div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                        </div>
                    </div>
                </div>


        <!--  Start verification kyc -->
    </div>
    <div class="modal fade" id="kycModal" tabindex="-1" aria-labelledby="kycModal" data-bs-keyboard="true"
        data-bs-backdrop="static" data-bs-keyboard="false">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel2">Verify Account
                    </h6>
                </div>
                <div class="modal-body">
                    We're excited to have you on board! However, we need to verify your identity before activating your
                    account. provide your Identification number below.
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
               <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-6">
        <form id="verify" name="verifyForm" method="POST" action="{{ route('verify-user') }}">
            @csrf
            <div class="mb-3">
                <p class="mb-2 text-muted text-center">Enter your BVN No.</p>
                <input type="text" id="bvn" name="bvn" class="form-control text-center" maxlength="11" required />
            </div>
            <div class="text-center mb-3 d-flex justify-content-center gap-2">
                <button type="submit" id="submit" class="btn btn-default">
                    <i class="lar la-check-circle"></i> Verify Now
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center mb-3">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="las la-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
 <!--  end verification kyc -->

@endsection
@push('page-js')
    <script>
        const marqueeInner = document.querySelector('.marquee-inner');

        marqueeInner.addEventListener('mouseover', () => {
            marqueeInner.style.animationPlayState = 'paused';
        });

        marqueeInner.addEventListener('mouseout', () => {
            marqueeInner.style.animationPlayState = 'running';
        });
    </script>
    <script>
        // Trigger modal if KYC is pending
        @if ($kycPending)
            const kycModal = new bootstrap.Modal(document.getElementById('kycModal'));
            kycModal.show();
        @endif
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('verify');
            const submitButton = document.getElementById('submit');

            if (form && submitButton) {
                form.addEventListener('submit', function() {
                    submitButton.disabled = true;
                    submitButton.innerText = 'Verifying ...';
                });
            }
        });
    </script>
@endpush

<style>
     /* Optional additional styling for better appearance */
    .header-with-close {
        border-bottom: 1px solid #e9ecef;
        background-color: #f8f9fa !important;
    }
    
    .btn-close {
        opacity: 0.7;
        font-size: 1.2rem;
    }
    
    .btn-close:hover {
        opacity: 1;
        transform: scale(1.1);
    }
    
    .rounded-circle {
        border: 2px solid rgba(0, 0, 0, 0.1);
    }
</style>