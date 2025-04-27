@extends('layouts.dashboard')
@section('title', 'Funding')
@section('content')
    <div class="page">

        @include('components.app-header')
        @include('components.app-sidebar')
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

              
             
                 <!-- Start Our Services-->
    <div class="col-12">
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
            <h5 class="card-title mb-0 fw-bold text-dark">Wallet Funding</h5>
        </div>
        <div class="card-body">
            <div class="row g-3 justify-content-center">

                @php
                    $services = [
                        ['route' => '#', 'icon' => 'fund.png', 'title' => 'Wallet History', 'attributes' => 'data-bs-toggle="modal" data-bs-target="#menumodal"'],
                        ['route' => '#', 'icon' => 'tv.png', 'title' => 'More Funding Option', 'attributes' => 'data-bs-toggle="modal" data-bs-target="#menumodal02"'],
                        ['route' => '#', 'icon' => 'card.png', 'title' => 'Link Account', 'attributes' => 'data-bs-toggle="modal" data-bs-target="#accountModal"'],                    ];
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
</div>
<!-- End Our Services--> 


            <!-- Menu Modal 01 -->
            <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content shadow">
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="d-flex flex-column gap-3">
                                    <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                                        <i class="bi bi-wallet2 text-primary fs-4 me-3"></i>
                                        <div>
                                            <p class="mb-0 text-muted small">Wallet Balance</p>
                                            <p class="mb-0 fw-bold text-primary">&#x20A6;{{ $wallet_balance }}</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center p-3 bg-success-subtle rounded shadow-sm">
                                        <i class="bi bi-bank text-success fs-4 me-3"></i>
                                        <div>
                                            <p class="mb-0 text-muted small">Deposited</p>
                                            <p class="mb-0 fw-bold text-success">&#x20A6;{{ $deposit }}</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center p-3 bg-danger-subtle rounded shadow-sm">
                                        <i class="bi bi-cash-stack text-danger fs-4 me-3"></i>
                                        <div>
                                            <p class="mb-0 text-muted small">Spent</p>
                                            <p class="mb-0 fw-bold text-danger">&#x20A6;{{ number_format($spent, 2) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('transactions', 'transactions') }}" class="text-decoration-none">View Transactions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Model 01 ends -->


     <!-- Menu Modal 02 -->
     <div class="modal fade" id="menumodal02" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
                <div class="text-center">
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center p-3 bg-light rounded shadow-sm">
                            <i class="bi bi-wallet2 text-primary fs-4 me-3"></i>
                            <div>
                                <p class="mb-0 text-muted small">Wallet Balance</p>
                                <p class="mb-0 fw-bold text-primary">&#x20A6;{{ $wallet_balance }}</p>
                            </div>
                        </div>

                        

                    </div>

                    @if ($online_funding->is_enabled || $manual_funding->is_enabled)
                        <div class="mt-4">
                            <div class="card-wrapper rounded-3">
                                @if ($online_funding->is_enabled)
                                <div id="error" style="display:none"
                                                                class="alert alert-danger alert-dismissible" role="alert">
                                                            </div>
                                    <h6 class="sub-title mt-3">Online Payment</h6>
                                    <span style="text-transform:none">Choose a payment method and enter amount</span>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="ptm44" type="radio" name="radio1" value="moniepoint">
                                                <label class="form-check-label mb-0" for="ptm44">
                                                    <img width="50%" class="img-fluid" src="{{ asset('assets/images/monify.png') }}" alt="card">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <form class="row mt-2" name="paymentForm" id="paymentForm">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="first-name" value="{{ Auth::user()->first_name }}">
                                        <input type="hidden" name="last-name" value="{{ Auth::user()->last_name }}">
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                        <input type="hidden" name="phone_number" value="{{ Auth::user()->phone_number }}">
                                        <input type="hidden" id="desc" value="Wallet Top Up">
                                        
                                        <div class="col-12">
                                            <label class="form-label">Top up Amount</label>
                                            <input class="form-control border border-dark" onkeypress="return isNumberKey(event)" 
                                                   type="text" id="amount" name="amount" required>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-default btn-lg shadow-sm w-100" id="topup" type="button">
                                                <i class="icofont icofont-pay"></i> Top Up
                                            </button>
                                        </div>
                                    </form>
                                @endif

                                @if ($manual_funding->is_enabled)
                                    <hr class="hr">
                                    <h6 class="sub-title mt-3">Manual Funding</h6>
                                    <span style="text-transform:none">Transfer to account below</span>

                                    <div class="d-flex align-items-top mt-2">
                                        <div class="me-2">
                                            <span class="avatar avatar-sm avatar-rounded">
                                                <img src="{{ asset('assets/images/OPay.jpg') }}" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold mb-0">{{ env('accountName') }}</p>
                                            <span class="fs-14 acctno2">{{ env('accountNumber') }}</span>
                                            <br>
                                            <span class="fs-12">{{ env('bankName') }}</span>
                                        </div>
                                        <div class="fw-semibold fs-15">
                                            <a href="#" class="btn btn-default btn-lg shadow-sm w-100">Copy</a>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-default btn-lg shadow-sm w-100" 
                                            data-bs-toggle="modal" data-bs-target="#fundingRequestModal">
                                        Request Funding
                                    </button>
                                @endif
                            </div>
                        </div>
                    @else
                        <p class="fw-bold mt-3">
                            <i class="bi bi-megaphone"></i> Coming soon
                        </p>
                    @endif

                    <div class="mt-3">
                        <a href="{{ route('transactions', 'transactions') }}" class="text-decoration-none">View Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Funding Request Modal -->
<div class="modal fade" id="fundingRequestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Manual Funding Request</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="fundingRequestForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="transfer">Transfer</option>
                            <option value="bank_deposit">Bank Deposit</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Senders Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">Transaction ID</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Model 01 ends-->
                

<!-- Virtual account start -->
<div class="d-flex justify-content-center">
    <div class="col-xl-8">
        <div class="row">
            <div class="col-xl-8 col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Virtual Account Numbers
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($virtual_funding->is_enabled)
                            <small class="fw-semibold">Fund your wallet instantly by depositing into the virtual account number</small>
                            <ul class="list-unstyled crm-top-deals mb-0 mt-3">
                                @if ($virtual_accounts != null)
                                    @foreach ($virtual_accounts as $data)
                                        <li>
                                            <div class="d-flex align-items-top flex-wrap">
                                                <div class="me-2">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        @if ($data->bankName == 'Wema bank')
                                                            <img src="{{ asset('assets/images/wema.jpg') }}" alt="">
                                                        @elseif($data->bankName == 'Moniepoint Microfinance Bank')
                                                            <img src="{{ asset('assets/images/moniepoint.jpg') }}" alt="">
                                                        @elseif($data->bankName == 'PalmPay')
                                                            <img src="{{ asset('assets/images/palmpay.png') }}" alt="">
                                                        @else
                                                            <img src="{{ asset('assets/images/sterling.png') }}" alt="">
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fw-semibold mb-0">{{ $data->accountName }}</p>
                                                    <span class="fs-14 acctno">{{ $data->accountNo }}</span>
                                                    <br>
                                                    <span class="fs-12">{{ $data->bankName }}</span>
                                                </div>
                                                <div class="fw-semibold fs-15">
                                                    <a href="#" class="btn btn-light btn-sm copy-account-number">Copy</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        @else
                            <p class="fw-bold text-center">
                                <i class="bi bi-slash-circle text-danger">&nbsp;</i>Virtual Account Disabled
                            </p>
                        @endif
                        <hr>
                        <small class="fw-semibol mb-2 text-danger">
                            If your funds are not received within 30mins, please 
                            <a href="{{ route('support') }}">Contact Support
                                <i class="bx bx-headphone side-menu__icon"></i>
                            </a>
                        </small>
                        <div class="alert alert-danger alert-dismissible text-center" id="errorMsg" style="display:none;" role="alert">
                            <small id="message">Processing your request.</small>
                        </div>
                        <div class="alert alert-success alert-dismissible text-center" id="successMsg" style="display:none;" role="alert">
                            <small id="smessage">Processing your request.</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image column - only visible on desktop -->
            <div class="col-xl-3 d-none d-xl-block">
                <div class="card custom-card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/tom.jpg') }}" alt="Virtual Account" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Virtual account end -->



           <!-- Account Linking Modal -->
<div class="modal fade" id="accountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Link Your Card</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="fundingRequestForm">
        <div class="modal-body">
          <div class="mb-3">
            <label for="account_number" class="form-label">Bank Account Number</label>
            <input type="text" class="form-control" id="account_number" name="account_number" maxlength="10" required>
          </div>

          <div class="mb-3">
            <label for="card_name" class="form-label">Name on Card</label>
            <input type="text" class="form-control" id="card_name" name="card_name" required>
          </div>

          <div class="mb-3">
            <label for="card_number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" pattern="\d{16}" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="expiry_date" class="form-label">Expiry Date</label>
              <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" pattern="(0[1-9]|1[0-2])\/\d{2}" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" pattern="\d{3}" placeholder="123" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="card_pin" class="form-label">Card PIN</label>
            <input type="password" class="form-control" id="card_pin" name="card_pin" maxlength="4" pattern="\d{4}" placeholder="****" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">Link Card</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Account Linking Modal -->


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

  <!-- main page content -->
  <div class="main-container container">
            <!-- select Amount -->
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <input type="text" class="trasparent-input text-center" value="0.00" placeholder="Enter Amount">
                    <div class="text-center"><span class="text-muted">Amount in USD</span>
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
                            <p>Wallet Balance</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">&#x20A6;{{ $wallet_balance }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col">
                            <p>Transaction Charge</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">0.00</p>
                        </div>
                    </div>
                    <div class="row fw-medium">
                        <div class="col-12">
                            <div class="dashed-line mb-3"></div>
                        </div>
                        <div class="col">
                            <p>Deposited</p>
                        </div>
                        <div class="col-auto text-end">
                            <p class="text-muted">&#x20A6;{{ $deposit }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Saving targets -->
            </div>
            <div class="row mb-4">
                <div class="col-12 ">
                    <a href="#" class="btn btn-default btn-lg shadow-sm w-100">
                        Add to Wallet
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
                < class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
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


@endsection
@push('page-js')
    @if ($online_funding->is_enabled == 1)
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
        <script src="{{ asset('assets/js/custom-gates.js') }}"></script>
        <script>
            window.APP_ENV = {
                MONNIFYCONTRACT: "{{ env('MONNIFYCONTRACT') }}",
                MONNIFYAPI: "{{ env('MONNIFYAPI') }}",
            };
        </script>
    @endif

    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#fundingRequestForm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: "/funding-request",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.code == 11) {
                            alert(response.message);
                        } else {
                            alert("Funding request submitted successfully!");
                            $("#fundingRequestModal").modal("hide");
                            $("#fundingRequestForm")[0].reset();
                        }

                    },
                    error: function(error) {
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });
    </script>

    
@endpush


