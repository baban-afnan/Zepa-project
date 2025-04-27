@extends('layouts.dashboard')
@section('title', 'Transfer Funds P2P')
@section('content')
    <div class="page">
        @include('components.app-header')
        @include('components.app-sidebar')
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">

         <!-- Start::app-content -->
         <div class="main-content app-content">
            <div class="container-fluid">
                


                <div class="card-body mt-3">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! session('success') !!}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">

                            @php
                                $services = [
                                    ['route' => '#', 'icon' => 'transfer.png', 'title' => 'Trasfer To zepa', 'attributes' => 'data-bs-toggle="modal" data-bs-target="#menumodal"'],
                                    ['route' => '#', 'icon' => 'transfer.png', 'title' => 'Transfer to Banks', 'attributes' => 'data-bs-toggle="modal" data-bs-target="#menumodal02"'],
                                    ['route' => route('funding'), 'icon' => 'fund.png', 'title' => 'Fund Wallet'],
                                ];
                            @endphp

                            @foreach($services as $service)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
                                    <a href="{{ $service['route'] }}" class="text-decoration-none" {!! $service['attributes'] ?? '' !!}>
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

               
<div class="modal fade" id="menumodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                                         <i class="bi bi-wallet2 me-2"></i> Zepa Transfer
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="text-center">
                                    <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm mb-3">
                                        <i class="bi bi-wallet2 text-primary fs-4 me-3"></i>
                                        <div>
                                            <p class="mb-0 text-muted small">Your wallet Id is</p>
                                            <p class="mb-0 fw-bold text-primary">{{ Auth::user()->phone_number }}</p>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="ti ti-wallet fs-16 side-menu__icon"></i>
                                        <span class="fw-bold ms-2">Transfer to Zepa</span>
                                    </div>
                                </div>

                                <div class="card-body mt-3">
                                    @if (session('zepa_success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {!! session('zepa_success') !!}
                                        </div>
                                    @endif

                                    @if (session('zepa_error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('zepa_error') }}
                                        </div>
                                    @endif

                                    @if ($errors->hasBag('zepa_transfer'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach ($errors->getBag('zepa_transfer')->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="rounded" style="background:#e0f7fa; border: 1px solid #b2ebf2;">
                                        <div class="mb-3">
                                            <div class="p-3 text-center">
                                                <p class="text-info fw-bold mb-1">📢 Important!</p>
                                                <p class="text-muted small mb-0">Send money to other Zepa users</p>
                                                <p class="text-muted small mb-0"><span class="fw-bold">absolutely free</span> of charge!</p>
                                                <small class="text-info fst-italic">Limited time offer!</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <form id="transfer" name="transfer" action="{{ route('transfer-funds') }}" method="POST" class="p-3">
                                            @csrf
                                            <div class="mb-3 text-center">
                                                <label for="Wallet_ID" class="form-label fw-semibold">Recipient's Wallet ID</label>
                                                <input type="text" id="Wallet_ID" name="Wallet_ID" value=""
                                                       class="form-control text-center mx-auto" style="max-width: 400px;" size="30" maxlength="11" required />
                                                <small class="form-text text-muted">Enter the Zepa wallet ID of the recipient.</small>
                                                <p id="reciever" class="mt-2"></p>
                                            </div>


                                            <div class="mb-3 text-center">
                                                <label for="Amount" class="form-label fw-semibold">Amount to Transfer</label>
                                                <input type="number" id="Amount" name="Amount" value=""
                                                       class="form-control text-center mx-auto" style="max-width: 400px;" size="30" maxlength="5" required />
                                                <small class="form-text text-muted">Enter the amount you wish to transfer.</small>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" id="transfer" class="btn btn-default btn-lg shadow-sm w-100"><i
                                                        class="las la-exchange-alt"></i> Transfer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
<div class="modal fade" id="menumodal02" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                                    <i class="bi bi-wallet2 me-2"></i> Bank Transfer
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body p-4">
                                <div class="card border-primary mb-4">
                                    <div class="card-body p-3 d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                                            <i class="bi bi-wallet2 text-primary fs-4"></i>
                                        </div>
                                        <div>
                                            <p class="mb-1 text-muted small">Your wallet ID</p>
                                            <h6 class="mb-0 fw-bold text-primary">{{ Auth::user()->phone_number }}</h6>
                                        </div>
                                    </div>
                                </div>

                                @if (session('zepa_success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        {!! session('zepa_success') !!}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('zepa_error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        {{ session('zepa_error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if ($errors->hasBag('zepa_transfer'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                        <ul class="mb-0 ps-3">
                                            @foreach ($errors->getBag('zepa_transfer')->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form name="payoutForm" id="payoutForm" method="post" action="{{ route('payout') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="amount" class="form-label fw-semibold">Amount to Send</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">₦</span>
                                            <input type="number" class="form-control py-2" id="amount" name="amount" placeholder="Enter amount">
                                        </div>
                                        <div id="amountNotification" class="text-danger small mt-1"></div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="acctno" class="form-label fw-semibold">Account Number</label>
                                        <input type="text" class="form-control" name="accountNumber" maxlength="10" id="acctno" placeholder="Enter account number">
                                        <div id="reciever" class="text-success small mt-2 fw-semibold"></div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="input-file" class="form-label">Bank Name
                                        </label>
                                        <select name="bankCode" id="bankDropdown"
                                                class="form-select text-center">
                                                <option value="select bank">Select Bank</option>
                                        </select>
                                    </div>


                                    <div class="mb-4">
                                        <label for="reference" class="form-label fw-semibold">Remark (Optional)</label>
                                        <textarea class="form-control" name="reference" rows="2" placeholder="Add a note"></textarea>
                                    </div>

                                    <div class="d-grid">
                                        <button type="button" id="pinCheckModal" class="btn btn-default btn-lg shadow-sm w-100">
                                            <span class="fw-bold">Continue</span>
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="pinCheckModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable"> <div class="modal-content">
              <div class="modal-body"> <h6 class="modal-title mb-3" id="pinCheckModalLabel">Confirm Transaction PIN</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <form name="pinCheckForm" id="pinCheckForm">
                    <div class="mb-3">
                        <small>No PIN? No worries! Set one up now. 👉 <u><a
                                        href="{{ route('profile.edit') }}">Settings</a></u></small><br>
                        <label for="pinInput" class="form-label mt-2">Enter your PIN</label>
                        <div class="position-relative">
                            <input type="password" id="pinInput" class="form-control text-center letter-spacing"
                                   placeholder="• • • •" maxlength="4" readonly
                                   style="font-size: 1.5rem; letter-spacing: 0.5rem; background-color: # #6600cc;">
                            <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                <i class="bi bi-shield-lock text-muted"></i>
                            </div>
                        </div>
                        <div class="invalid-feedback text-center" id="pinErrorMessage">
                            Invalid PIN. Please try again.
                        </div>
                    </div>

                    <div class="number-pad mt-3">
                        <div class="row g-2 mb-2">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="1">1</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="2">2</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="3">3</button>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="4">4</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="5">5</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="6">6</button>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="7">7</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="8">8</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="9">9</button>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-light w-100 py-3" disabled></button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-secondary w-100 py-3 num-btn" data-num="0">0</button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-danger w-100 py-3" id="clearPinBtn">
                                    <i class="bi bi-backspace"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                <button type="button" class="btn btn-primary" id="verifyPinButton">Proceed</button>
            </div>
        </div>
    </div>
</div>
    <!-- main page content -->
  <div class="main-container container">
            <!-- select Amount -->
            <div class="row">
                <div class="col-12 text-center mb-4">
                        <button class="btn btn-link btn-sm text-muted px-1 dropdown-toggle" type="button" id="ln1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Amount breakdown -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p>Wallet History</p>
                        </div>
                        <div class="col-auto text-end">
                            <a href="{{ route('transactions') }}" class="text-muted text-decoration-none">View Transactions</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Tranfer Chargies</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">20.0</p>
                        </div>
                    </div>
                    <div class="row fw-medium">
                        <div class="col-12">
                            <div class="dashed-line mb-3"></div>
                        </div>
                        <div class="col">
                            <p>Deposit Chargies</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">0.00</p>
                        </div>
                    </div>
                </div>
            </div>
          
  <!-- payment modes -->
  <div class="row mb-3">
                <div class="col align-self-center">
                    <h6 class="title">Payment Modes</h6>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#" class="card shadow-sm mb-3 text-normal">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 p-1 shadow-sm shadow-warning rounded-15">
                                        <div class="icons bg-warning text-white rounded-12">
                                            <img src="assets/images/mastercard.png" alt="" class="vm mw-50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center">
                                    <p>Maestro card<br><small class="text-opac">**** **** **** 5689</small></p>
                                </div>
                                <div class="col-auto align-self-center">
                                    <i class="bi bi-chevron-right text-color-theme"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="#" class="card shadow-sm mb-3 text-normal">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 p-1 shadow-sm shadow-primary rounded-15">
                                        <div class="icons bg-primary text-white rounded-12">
                                            <img src="assets/images/visa.jpg" alt="" class="vm mw-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center">
                                    <p>Visa card<br><small class="text-opac">Add your card</small></p>
                                </div>
                                <div class="col-auto align-self-center">
                                    <i class="bi bi-chevron-right text-color-theme"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> 
            <!-- offers banner -->
           <!-- offers banner -->
           <div class="row mb-4">
    <div class="col-12">
        <div class="card theme-bg overflow-hidden">
            <div class="row g-0 align-items-center" style="height: 100px;">
                <div class="col-7 d-flex flex-column justify-content-center pe-2">
                    <div class="card-body py-2">
                        <h5 class="mb-1"><span class="fw-light text-white">Get 200N</span><br /><span class="fw-light text-white">By inviting new User to zepa</span></h5>
                    </div>
                </div>
                <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                    <figure class="m-0 p-0">
                        <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#claimModal">Claim Now</button>

                        <!-- Claim Modal -->
                        <div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="claimModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="claimModalLabel">Claim Offer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to claim this offer?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('claim') }}" class="btn btn-primary">Claim Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="assets/images/offerbg.png" alt="Offer Image" class="img-fluid h-30 w-30 object-fit-cover d-none">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end offers banner -->


            <!-- offers loan -->
           <div class="row mb-4">
    <div class="col-12">
        <div class="card theme-bg overflow-hidden">
            <div class="row g-0 align-items-center" style="height: 100px;">
                <div class="col-7 d-flex flex-column justify-content-center pe-2">
                    <div class="card-body py-2">
                        <h5 class="mb-1"><span class="fw-light text-white">Get Loan</span><br /><span class="fw-light text-white">Apply for Loan</span></h5>
                    </div>
                </div>
                <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                    <figure class="m-0 p-0">
                        <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#claimModal02">Apply Now</button>

                        <!-- Claim Modal -->
                        <div class="modal fade" id="claimModal02" tabindex="-1" aria-labelledby="claimModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="claimModalLabel">Loan Offer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You are not qualify for loan make more transactions and qualify for the loan with low interest</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="assets/images/offerbg.png" alt="Offer Image" class="img-fluid h-30 w-30 object-fit-cover d-none">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- end offers loan -->

            <div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                        </div>
                    </div>
                </div>

                <!-- Loan Modal -->
<div class="modal fade" id="smemodal" tabindex="-1" aria-labelledby="smemodal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smemodal">Loan Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You are not qualified for a loan. Make more transactions to qualify for a loan with low interest.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const smemodal = new bootstrap.Modal(document.getElementById('smemodal'));
        smemodal.show();
    });
</script>
           


<script>
document.addEventListener('DOMContentLoaded', function() {
    const pinInput = document.getElementById('pinInput');
    const numButtons = document.querySelectorAll('.num-btn');
    const clearPinBtn = document.getElementById('clearPinBtn');
    const verifyPinButton = document.getElementById('verifyPinButton'); // Get the proceed button

    // Handle number button clicks
    numButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (pinInput.value.length < 4) {
                pinInput.value += this.getAttribute('data-num');
                // Automatically proceed when PIN reaches 4 digits
                if (pinInput.value.length === 4) {
                    verifyPinButton.click(); // Programmatically click the proceed button
                }
            }
        });
    });

    // Handle clear button click
    clearPinBtn.addEventListener('click', function() {
        pinInput.value = pinInput.value.slice(0, -1);
    });

    // Prevent keyboard from showing on mobile
    pinInput.addEventListener('focus', function() {
        this.blur();
    });

    // Allow keyboard input as fallback (hidden)
    pinInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
        // Automatically proceed if keyboard input reaches 4 digits
        if (this.value.length === 4) {
            verifyPinButton.click(); // Programmatically click the proceed button
        }
    });
});

</script>
@endsection
@push('page-js')
    <script src="{{ asset('assets/js/wallet.js') }}"></script>
@endpush