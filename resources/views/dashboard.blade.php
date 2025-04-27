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
              <h1 class="fw-light mb-0">&#x20A6;{{ $wallet_balance }}</h1>
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
                                            <p class="size-10 text-secondary mb-0">Unclaimed Bonus</p>
                                             &#x20A6;{{ $bonus_balance }}</h4>
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
                                                <a href="{{ route('claim') }}">
                                                            <span
                                                                class="avatar avatar-md avatar-rounded bg-info-transparent">
                                                                <i class="ti ti-arrow-up fs-16"></i>
                                                            </span>
                                                        </a>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <p class="size-10 text-secondary mb-0">History</p>
                                            {{ number_format($transaction_count) }}
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
                <div class="row justify-content-between gx-0 mx-0 pb-3">
                    <div class="col-auto text-center">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                    <i class="bi bi-receipt-cutoff size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Pay</p>
                        </button>
                    </div>
                    <div class="col-auto text-center">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-arrow-up-right size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Send</p>
                        </button>
                    </div>
                    <div class="col-auto text-center">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal02">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-arrow-down-left size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Receive</p>
                        </button>
                    </div>
                    <div class="col-auto text-center">
                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal">
                            <div class="avatar avatar-60 p-1 shadow-sm rounded-15 bg-opac mb-2">
                                <div class="icons bg-success text-white rounded-12 bg-opac">
                                <i class="bi bi-bank size-22"></i>
                                </div>
                            </div>
                            <p class="size-10 text-white">Withdraw</p>
                        </button>
                         </div>
                            </div>
                            <button class="btn btn-link mt-0 py-1 w-100 bar-more collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collpasemorelink" aria-expanded="false"
                                aria-controls="collpasemorelink">
                                <span class=""></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
             <!--End categories list -->

             <!-- Menu Modal 01 -->
    <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                    <div class="text-center">
                        <img src="assets/images/QRCode.png" alt="" class="mb-2" />
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                        <a href="{{ route('airtime') }}" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Buy Airtime</p>
                        </div>

                        <div class="col-auto text-center">
                        <a href="{{ route('data') }}" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2">
                                <div class="icons text-purple">
                                    <i class="bi bi-wifi size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Buy Data</p>
                        </div>

                        <div class="col-auto text-center">
                        <a href="{{ route('sme-data') }}" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2">
                                <div class="icons text-success">
                                    <i class="bi bi-wifi size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Buy SME Data</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="#" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2">
                                <div class="icons text-secondary">
                                <i class="bi bi-lightning-fill" style="font-size: 24px;"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Electricity</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="#" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2">
                                <div class="icons text-warning">
                                    <i class="bi bi-cash-stack size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bet</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="#" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2">
                                <div class="icons text-blue">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">TV Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Model 01 ends-->

     <!-- Menu Modal 02 -->
     <div class="modal fade" id="menumodal02" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                    <div class="text-center">
                        <img src="assets/images/QRCode.png" alt="" class="mb-2" />
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bill</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive Money</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2">
                                <div class="icons text-warning">
                                    <i class="bi bi-wallet2 size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Add Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2">
                                <div class="icons text-info">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </div>
                            <p class="size-10 text-secondary">Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Model 02 ends-->

     <!-- Menu Modal 03 -->
     <div class="modal fade" id="menumodal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                    <div class="text-center">
                        <img src="assets/images/QRCode.png" alt="" class="mb-2" />
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bill</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive Money</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2">
                                <div class="icons text-warning">
                                    <i class="bi bi-wallet2 size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Add Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2">
                                <div class="icons text-info">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </div>
                            <p class="size-10 text-secondary">Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Model 03 ends-->


      <!-- Menu Modal 04 -->
    <div class="modal fade" id="menumodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow">
                <div class="modal-body">
                    <h1 class="mb-4"><span class="text-secondary fw-light">Quick</span><br />Actions!</h1>
                    <div class="text-center">
                        <img src="assets/images/QRCode.png" alt="" class="mb-2" />
                        <p class="small text-secondary mb-4">Ask to scan this QR-Code<br />to accept money</p>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-auto text-center">
                            <a href="bills.html" class="avatar avatar-70 p-1 shadow-sm shadow-danger rounded-20 bg-opac mb-2">
                                <div class="icons text-danger">
                                    <i class="bi bi-receipt-cutoff size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Pay Bill</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="sendmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-purple rounded-20 bg-opac mb-2">
                                <div class="icons text-purple">
                                    <i class="bi bi-arrow-up-right size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Send Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="receivemoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-success rounded-20 bg-opac mb-2">
                                <div class="icons text-success">
                                    <i class="bi bi-arrow-down-left size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Receive Money</p>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto text-center">
                            <a href="withdraw.html" class="avatar avatar-70 p-1 shadow-sm shadow-secondary rounded-20 bg-opac mb-2">
                                <div class="icons text-secondary">
                                    <i class="bi bi-bank size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Withdraw</p>
                        </div>

                        <div class="col-auto text-center">
                            <a href="addmoney.html" class="avatar avatar-70 p-1 shadow-sm shadow-warning rounded-20 bg-opac mb-2">
                                <div class="icons text-warning">
                                    <i class="bi bi-wallet2 size-24"></i>
                                </div>
                            </a>
                            <p class="size-10 text-secondary">Add Money</p>
                        </div>

                        <div class="col-auto text-center">
                            <div class="avatar avatar-70 p-1 shadow-sm shadow-info rounded-20 bg-opac mb-2">
                                <div class="icons text-info">
                                    <i class="bi bi-tv size-24"></i>
                                </div>
                            </div>
                            <p class="size-10 text-secondary">Recharge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Model 04 ends-->

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
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
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


       
    </div>
@endsection

