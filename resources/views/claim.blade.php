@extends('layouts.dashboard')
@section('title', 'Claim Referral Bonus')
@section('content')
    <div class="page">

        @include('components.app-header')
        @include('components.app-sidebar')
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">



        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                

            <div class="card-body mt-3">
                <!-- Start::page-header -->
                <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                    <div>
                        <p class="fw-semibold fs-18 mb-0">Claim Referral Bonus</p>
                        <span class="fs-semibold text-muted">To qualify for a bonus, each referral must complete a minimum of
                            5
                            transactions. Once this requirement is met, the bonus can be claimed.  Referral Code : {{ Auth::user()->referral_code }} </span>
                    </div>
                </div>
                <!-- End::page-header -->


                  <!-- buttons -->
            <div class="row mb-4">
                <div class="col">
                    <button onclick="shareReferral()" class="btn btn-light btn-lg shadow-sm w-100">
                    Invite
                </div>
                <div class="col">
                    <a href="#" class="btn btn-default btn-lg shadow-sm w-100">Message</a>
                </div>
            </div>
               <!--end buttons -->


                <!-- income expense-->
            <div class="row mb-4">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 p-1 shadow-sm shadow-success rounded-15">
                                        <div class="icons bg-success text-white rounded-12">
                                            <i class="bi bi-arrow-down-left"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="size-10 text-secondary mb-0">Bonus</p>
                                    <h4>&#x20A6;{{ $bonus_balance }}</h4>
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
                                        <div class="icons bg-danger text-white rounded-12">
                                            <i class="bi bi-arrow-up-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="size-10 text-secondary mb-0">Unclaimed Bonus</p>
                                    <h4> &#x20A6;{{ $unclaimed_balance }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <!--End income expense-->


                  <!--Start refferal-->
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card custom-card ">
                                            <div class="card-header justify-content-between">
                                                <div class="card-title">
                                                    Referred Accounts
                                                </div>
                                            </div>

                                            <div class="card-body" style="background:#fafafc;">
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                @if (session('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                @if (!$users->isEmpty())
                                                    @php
                                                        $currentPage = $users->currentPage(); // Current page number
                                                        $perPage = $users->perPage(); // Number of items per page
                                                        $serialNumber = ($currentPage - 1) * $perPage + 1; // Starting serial number for current page
                                                    @endphp
                                                    <div class="table-responsive" width="100%">
                                                        <table class="table" style="background:#fafafc !important">
                                                            <thead>
                                                                <tr class="table-primary ">
                                                                    <th>ID</th>
                                                                    <th>Email Address</th>
                                                                    <th>Claim</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($users as $data)
                                                                    <tr>
                                                                        <th scope="row">{{ $serialNumber++ }}</th>
                                                                        <td>{{ $data->email }}</td>
                                                                        <td>
                                                                            &#8358;
                                                                            {{ number_format($data->total_bonus_amount, 2) }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($data->transactions_count >= $transaction_count && $data->claim_id == 0)
                                                                                <a href="{{ route('claim-bonus', $data->id) }}"
                                                                                    class="btn btn-sm btn-success btn-wave waves-effect waves-light">
                                                                                    <i
                                                                                        class="ri-exchange-funds-line fs-16 align-middle me-1 d-inline-block"></i>Claim
                                                                                </a href>
                                                                            @elseif ($data->claim_id == 1)
                                                                                <span
                                                                                    class="badge bg-outline-primary">Claimed</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge bg-outline-warning">Pending</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <!-- Pagination Links -->
                                                        <div class="d-flex justify-content-center">
                                                            {{ $users->links('vendor.pagination.bootstrap-4') }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <center><img width="65%"
                                                            src="{{ asset('assets/images/no-transaction.gif') }}"
                                                            alt=""></center>
                                                    <p class="text-center fw-semibold  fs-15"> You have not referred any
                                                        accounts yet. Invite friends and family to join and earn rewards
                                                        when
                                                        they complete the required number of transactions!</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                          
        <!-- Offers Section -->
        <div class="row mb-4">
            <!-- Loan Offer -->
            <div class="col-12">
                <div class="card theme-bg overflow-hidden">
                    <div class="row g-0 align-items-center" style="height: 100px;">
                        <div class="col-7 d-flex flex-column justify-content-center pe-2">
                            <div class="card-body py-2">
                                <h5 class="mb-1">
                                    <span class="fw-light text-white">Get Loan</span><br />
                                    <span class="fw-light text-white">Apply for Loan</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                            <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#loanModal">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loan Modal -->
            <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loanModalLabel">Loan Offer</h5>
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
        </div>

        <div class="row mb-4">
            <!-- Purchase Offer -->
            <div class="col-12">
                <div class="card theme-bg overflow-hidden">
                    <div class="row g-0 align-items-center" style="height: 100px;">
                        <div class="col-7 d-flex flex-column justify-content-center pe-2">
                            <div class="card-body py-2">
                                <h5 class="mb-1">
                                    <span class="fw-light text-white">Buy Now Now</span><br />
                                    <span class="fw-light text-white">Buy airtime and data and get 10% discount (limited offer)</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                            <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#purchaseModal">Buy Now Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Purchase Modal -->
            <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="purchaseModalLabel">Purchase Offer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3 justify-content-center">
                                @php
                                    $services = [
                                        ['route' => route('airtime'), 'icon' => 'airtime.png', 'title' => 'Buy Airtime'],
                                        ['route' => route('more-services', 'data'), 'icon' => 'data.png', 'title' => 'Buy Internet Data'],
                                        ['route' => route('electricity'), 'icon' => 'electric.png', 'title' => 'Pay Electricity Bills'],
                                        ['route' => route('education'), 'icon' => 'education.png', 'title' => 'Educational Pin'],
                                    ];
                                @endphp

                                @foreach($services as $service)
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
                                        <a href="{{ $service['route'] }}" class="text-decoration-none">
                                            <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                                <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}" class="mb-2 service-icon">
                                                <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


          
@endsection
<script>
    function shareReferral() {
        const referralCode = "{{ Auth::user()->referral_code }}";
        const url = `https://zepasolutions.com/register?ref=${referralCode}`;
        const shareData = {
            title: 'Join me on this site!',
            text: `Use my referral code and join
            you will get 200 Naira Bunus and get 10% discount on airtime and data purchase welcome onboard: ${referralCode}`,
            url: url
        };

        if (navigator.share) {
            navigator.share(shareData)
                .then(() => console.log('Referral shared successfully'))
                .catch((error) => console.error('Sharing failed', error));
        } else {
            // Fallback if Web Share API is not supported
            prompt("zepasolutions.com", url);
        }
    }
</script>