@extends('layouts.dashboard')
@section('title', 'Buy Data')
@push('page-css')
   
@endpush
@section('content')
    <div class="page">
        @include('components.app-header')
        @include('components.app-sidebar')
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">
        

        <div class="main-content app-content custom-margin-top">
            <div class="container-fluid">
                <!-- Start Our Services-->
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                            @php
                                $services = [
                                    ['route' => '#', 'icon' => 'data.png', 'title' => 'Buy SME data', 'attributes' => ['data-bs-toggle' => 'modal', 'data-bs-target' => '#smeModal']],
                                    ['route' => route('p2p'), 'icon' => 'transfer.png', 'title' => 'Transfer', 'attributes' => []],
                                    ['route' => route('bvn'), 'icon' => 'identity.png', 'title' => 'Buy Educational Pin', 'attributes' => []],
                                ];
                            @endphp

                            @foreach($services as $service)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
                                    <a href="{{ $service['route'] }}" @foreach($service['attributes'] ?? [] as $key => $value) {{ $key }}="{{ $value }}" @endforeach class="text-decoration-none">
                                        <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                            <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}"
                                                 class="mb-2 service-icon" width="50">
                                            <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Our Services-->

                <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>


                <!-- SME Data Modal -->
                <div class="modal fade sme-modal" id="smeModal" tabindex="-1" aria-labelledby="smeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="mb-0 text-white fw-semibold small text-center" id="smeModalLabel">SME Data Plans</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('assets/images/network.png') }}" alt="SME Data">
                                <h5>Corporate and SME Data For your Business</h5>
                                <p>Our SME data plans are specially designed for businesses and high-volume users with extended validity periods and competitive rates.</p>
                                
                                <div class="sme-data-plans">
                                    <!-- MTN SME Plans -->
                                    <div class="sme-plan-card">
                                        <div class="plan-name">MTN 10GB</div>
                                        <div class="plan-price">₦3,500</div>
                                        <small class="text-muted">30 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">MTN 20GB</div>
                                        <div class="plan-price">₦6,500</div>
                                        <small class="text-muted">30 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">MTN 50GB</div>
                                        <div class="plan-price">₦12,500</div>
                                        <small class="text-muted">60 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">MTN 100GB</div>
                                        <div class="plan-price">₦22,500</div>
                                        <small class="text-muted">90 days</small>
                                    </div>
                                    
                                    <!-- Airtel SME Plans -->
                                    <div class="sme-plan-card">
                                        <div class="plan-name">Airtel 10GB</div>
                                        <div class="plan-price">₦3,800</div>
                                        <small class="text-muted">30 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">Airtel 25GB</div>
                                        <div class="plan-price">₦8,500</div>
                                        <small class="text-muted">30 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">Airtel 60GB</div>
                                        <div class="plan-price">₦15,000</div>
                                        <small class="text-muted">60 days</small>
                                    </div>
                                    <div class="sme-plan-card">
                                        <div class="plan-name">Airtel 120GB</div>
                                        <div class="plan-price">₦25,000</div>
                                        <small class="text-muted">90 days</small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-lg shadow-sm w-100" data-bs-toggle="modal" data-bs-target="#menumodal02">Purchase Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rest of your existing content (data purchase form, price lists, etc.) -->
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
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
                            <button type="button" class="btn btn-default btn-lg shadow-sm w-100" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
       
        
                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="row mt-3">
                            <div class="col-xl-4">
                                <div class="row ">
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    <i class="bi bi-credit-card"></i></i> Buy Data
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <center>
                                                    <img class="img-fluid"
                                                        src="{{ asset('assets/images/network_providers.png') }}"
                                                        width="40%">
                                                </center>
                                                <p>To purchase data, select your mobile network, enter your mobile
                                                    number, and choose the amount to proceed with the transaction.</p>

                                                <div class="row text-center">
                                                    <div class="col-md-12">
                                                        @if (session('success'))
                                                            <div class="alert alert-success alert-dismissible fade show"
                                                                role="alert">
                                                                {!! session('success') !!}
                                                            </div>
                                                        @endif

                                                        @if (session('error'))
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                role="alert">
                                                                {{ session('error') }}
                                                            </div>
                                                        @endif

                                                        @if ($errors->any())
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                role="alert">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        <form id="buyDataForm" name="buy-data" method="POST"
                                                            action="{{ route('buydata') }}">
                                                            @csrf
                                                            <div class="mb-3 row">
                                                                <div class="col-md-12">
                                                                    <select name="network" id="service_id"
                                                                        class="form-select text-center"
                                                                        aria-label="Default select example">
                                                                        <option value="">Choose Network</option>
                                                                        @foreach ($servicename as $service)
                                                                            <option value="{{ $service->service_id }}">
                                                                                {{ $service->service_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <select name="bundle" id="bundle"
                                                                        class="form-select text-center"
                                                                        aria-label="Default select example">
                                                                        <option value="">Choose Bundle</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 mt-2">
                                                                    <p class="mb-2 text-muted">Amount To Pay</p>
                                                                    <input type="text" id="amountToPay" readonly
                                                                        value="" class="form-control text-center" />
                                                                </div>
                                                                <div class="col-md-12 mt-2">
                                                                    <p class="mb-0 text-muted">Phone Number</p>
                                                                    <input type="text" id="mobileno" name="mobileno"
                                                                        oninput="validateNumber()" value=""
                                                                        class="form-control phone text-center"
                                                                        maxlength="11" required />
                                                                    <p id="networkResult"></p>
                                                                </div>
                                                                <div class="col-md-12 mt-4">
                                                             <button type="submit" id="buy-data" class="btn btn-default btn-lg shadow-sm w-60">
                                                                 <i class="las la-shopping-cart me-2"></i>Purchase Data
                                                                 </button>
                                                             </div>
                                                           </div>
                                                       </form>
                                                    </div>
                                                </div>
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
                                    <span class="fw-light text-white">Verify Identity</span><br />
                                    <span class="fw-light text-white"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                            <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#loanModal">Verify Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loan Modal -->
            <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="purchaseModalLabel">Verification Offer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3 justify-content-center">
                                @php
                                    $services = [
                                        ['route' => route('bvn'), 'icon' => 'identity.png', 'title' => 'Verify BVN'],
                                        ['route' => route('nin2'), 'icon' => 'nimc1.png', 'title' => 'Verify NIN'],
                                        ['route' => route('nin-track'), 'icon' => 'nimc1.png', 'title' => 'Verify Tracking ID'],
                                        ['route' => route('nin-phone'), 'icon' => 'identity.png', 'title' => 'Verify Phone Number'],
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

        <div class="row mb-4">
            <!-- Purchase Offer -->
            <div class="col-12">
                <div class="card theme-bg overflow-hidden">
                    <div class="row g-0 align-items-center" style="height: 100px;">
                        <div class="col-7 d-flex flex-column justify-content-center pe-2">
                            <div class="card-body py-2">
                                <h5 class="mb-1">
                                    <span class="fw-light text-white">Pay Bills</span><br />
                                    <span class="fw-light text-white"></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center pe-3">
                            <button type="button" class="btn btn-light btn-sm text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#purchaseModal">Buy Now</button>
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
                                </div>
                            </div>
                            <div class="col-xl-8 d-none d-md-block">
    <div class="card custom-card shadow-sm border-0">
        <div class="card-header bg-primary text-white justify-content-between">
            <div class="card-title d-flex align-items-center">
                <i class="bi bi-list-task me-2 fs-4"></i> 
                <span class="fs-5 fw-semibold">Data Bundle Price List</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row g-0">
                <!-- Network Tabs Column -->
                <div class="col-md-3 border-end">
                    <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link d-flex align-items-center py-3 px-3 active" 
                           id="v-pills-mtn-tab" 
                           data-bs-toggle="pill" 
                           href="#mtn" 
                           role="tab" 
                           aria-controls="v-pills-mtn" 
                           aria-selected="true">
                            <img src="{{ asset('assets/images/mtn.png') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">MTN</span>
                        </a>
                        <a class="nav-link d-flex align-items-center py-3 px-3" 
                           id="v-pills-airtel-tab" 
                           data-bs-toggle="pill" 
                           href="#airtel" 
                           role="tab" 
                           aria-controls="v-pills-airtel" 
                           aria-selected="false">
                            <img src="{{ asset('assets/images/airtel.png') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">Airtel</span>
                        </a>
                        <a class="nav-link d-flex align-items-center py-3 px-3" 
                           id="v-pills-glo-tab" 
                           data-bs-toggle="pill" 
                           href="#glo" 
                           role="tab" 
                           aria-controls="v-pills-glo" 
                           aria-selected="false">
                            <img src="{{ asset('assets/images/glo.png') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">Glo</span>
                        </a>
                        <a class="nav-link d-flex align-items-center py-3 px-3" 
                           id="v-pills-9mobile-tab" 
                           data-bs-toggle="pill" 
                           href="#9mobile" 
                           role="tab" 
                           aria-controls="v-pills-9mobile" 
                           aria-selected="false">
                            <img src="{{ asset('assets/images/9mobile.png') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">9mobile</span>
                        </a>
                        <a class="nav-link d-flex align-items-center py-3 px-3" 
                           id="v-pills-smile-tab" 
                           data-bs-toggle="pill" 
                           href="#smile" 
                           role="tab" 
                           aria-controls="v-pills-smile" 
                           aria-selected="false">
                            <img src="{{ asset('assets/images/Smile.jpg') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">Smile</span>
                        </a>
                        <a class="nav-link d-flex align-items-center py-3 px-3" 
                           id="v-pills-spectranet-tab" 
                           data-bs-toggle="pill" 
                           href="#spectranet" 
                           role="tab" 
                           aria-controls="v-pills-spectranet" 
                           aria-selected="false">
                            <img src="{{ asset('assets/images/images.jpeg') }}" class="me-2" width="24" height="24">
                            <span class="fw-medium">Spectranet</span>
                        </a>
                    </div>
                </div>
                
                <!-- Content Column -->
                <div class="col-md-9">
                    <div class="tab-content p-4" id="v-pills-tabContent">
                        <!-- MTN Tab -->
                        <div class="tab-pane fade show active" id="mtn" role="tabpanel" aria-labelledby="v-pills-mtn-tab">
                            <h4 class="mb-3 text-primary fw-bold">MTN Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for MTN data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList1->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList1 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList1->appends(['table2_page' => $priceList2->currentPage(), 'table3_page' => $priceList3->currentPage(), 'table4_page' => $priceList4->currentPage(), 'table5_page' => $priceList5->currentPage(), 'table6_page' => $priceList6->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No MTN price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                        
                        <!-- Airtel Tab -->
                        <div class="tab-pane fade" id="airtel" role="tabpanel" aria-labelledby="v-pills-airtel-tab">
                            <h4 class="mb-3 text-primary fw-bold">Airtel Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for Airtel data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList2->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList2 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList2->appends(['table1_page' => $priceList1->currentPage(), 'table3_page' => $priceList3->currentPage(), 'table4_page' => $priceList4->currentPage(), 'table5_page' => $priceList5->currentPage(), 'table6_page' => $priceList6->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No Airtel price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                        
                        <!-- Glo Tab -->
                        <div class="tab-pane fade" id="glo" role="tabpanel" aria-labelledby="v-pills-glo-tab">
                            <h4 class="mb-3 text-primary fw-bold">Glo Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for Glo data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList3->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList3 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList3->appends(['table1_page' => $priceList1->currentPage(), 'table2_page' => $priceList2->currentPage(), 'table4_page' => $priceList4->currentPage(), 'table5_page' => $priceList5->currentPage(), 'table6_page' => $priceList6->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No Glo price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                        
                        <!-- 9mobile Tab -->
                        <div class="tab-pane fade" id="9mobile" role="tabpanel" aria-labelledby="v-pills-9mobile-tab">
                            <h4 class="mb-3 text-primary fw-bold">9mobile Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for 9mobile data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList4->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList4 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList4->appends(['table1_page' => $priceList1->currentPage(), 'table2_page' => $priceList2->currentPage(), 'table3_page' => $priceList3->currentPage(), 'table5_page' => $priceList5->currentPage(), 'table6_page' => $priceList6->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No 9mobile price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                        
                        <!-- Smile Tab -->
                        <div class="tab-pane fade" id="smile" role="tabpanel" aria-labelledby="v-pills-smile-tab">
                            <h4 class="mb-3 text-primary fw-bold">Smile Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for Smile data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList5->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList5 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList5->appends(['table1_page' => $priceList1->currentPage(), 'table2_page' => $priceList2->currentPage(), 'table3_page' => $priceList3->currentPage(), 'table4_page' => $priceList4->currentPage(), 'table6_page' => $priceList6->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No Smile price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                        
                        <!-- Spectranet Tab -->
                        <div class="tab-pane fade" id="spectranet" role="tabpanel" aria-labelledby="v-pills-spectranet-tab">
                            <h4 class="mb-3 text-primary fw-bold">Spectranet Data Plans</h4>
                            <p class="text-muted mb-4">We offer the most competitive rates for Spectranet data bundles. Enjoy seamless connectivity at unbeatable prices:</p>
                            
                            @if (!$priceList6->isEmpty())
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" class="fw-semibold">Data Plans</th>
                                                <th scope="col" class="fw-semibold text-end">Price (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($priceList6 as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td class="text-end fw-medium">₦{{ number_format($data->variation_amount, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $priceList6->appends(['table1_page' => $priceList1->currentPage(), 'table2_page' => $priceList6->currentPage(), 'table3_page' => $priceList3->currentPage(), 'table4_page' => $priceList4->currentPage(), 'table5_page' => $priceList5->currentPage()])->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <img width="50%" src="{{ asset('assets/images/no-transaction.gif') }}" alt="No data" class="mb-3">
                                    <p class="text-muted fw-semibold">No Spectranet price list available yet!</p>
                                </div>
                            @endif
                            
                            <div class="alert alert-info mt-4">
                                <i class="bi bi-lightbulb me-2"></i> Don't miss out on these amazing deals! Buy your data now and stay connected without breaking the bank.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                        </div>
                    </div>
                </div>



               <!--start SME model Section -->
<div class="modal fade" id="menumodal02" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-wifi me-2"></i> Buy SME Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form id="buyDataForm" name="buy-data" method="POST" action="{{ route('buy-sme-data') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Network</label>
                        <select name="network" id="service_id" class="form-select" required>
                            <option value="" disabled selected>Choose Network</option>
                            <option value="1">MTN</option>
                            <option value="2">GLO</option>
                            <option value="3">9MOBILE</option>
                            <option value="4">AIRTEL</option>
                            <option value="5">SMILE</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="type" class="form-label">Data Type</label>
                        <select name="type" id="type" class="form-select" disabled required>
                            <option value="" disabled selected>Select network first</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="plan" class="form-label">Data Plan</label>
                        <select name="plan" id="plan" class="form-select" disabled required>
                            <option value="" disabled selected>Select type first</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="amountToPay" class="form-label">Amount To Pay</label>
                        <div class="input-group">
                            <span class="input-group-text">₦</span>
                            <input type="text" id="amountToPay" class="form-control" readonly placeholder="Select plan to see amount">
                            <input type="hidden" id="actualAmount" name="amount">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="mobileno" class="form-label">Phone Number</label>
                        <input type="tel" id="mobileno" name="mobileno" 
                               class="form-control" 
                               pattern="[0-9]{11}" 
                               maxlength="11" 
                               placeholder="e.g. 08012345678" 
                               required>
                        <div id="networkResult" class="form-text"></div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" id="buy-data" class="btn btn-default btn-lg shadow-sm w-60">
                            <i class="las la-shopping-cart me-2"></i> Buy Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end SME model Section -->

<script src="{{ asset('assets/js/sme-data.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Network selection change handler
        $('#service_id').change(function() {
            const networkId = $(this).val();
            $('#type').html('<option value="" disabled selected>Loading...</option>');
            
            if (networkId) {
                // Fetch data types for selected network
                $.ajax({
                    url: '/api/data/types',
                    method: 'GET',
                    data: { network_id: networkId },
                    success: function(response) {
                        if (response.length > 0) {
                            let options = '<option value="" disabled selected>Select Data Type</option>';
                            response.forEach(type => {
                                options += `<option value="${type.id}">${type.name}</option>`;
                            });
                            $('#type').html(options).prop('disabled', false);
                        } else {
                            $('#type').html('<option value="" disabled selected>No types available</option>');
                        }
                        $('#plan').html('<option value="" disabled selected>Select type first</option>').prop('disabled', true);
                        $('#amountToPay').val('');
                    },
                    error: function() {
                        $('#type').html('<option value="" disabled selected>Error loading types</option>');
                    }
                });
            } else {
                $('#type').html('<option value="" disabled selected>Select network first</option>').prop('disabled', true);
                $('#plan').html('<option value="" disabled selected>Select type first</option>').prop('disabled', true);
                $('#amountToPay').val('');
            }
        });

        // Data type selection change handler
        $('#type').change(function() {
            const typeId = $(this).val();
            const networkId = $('#service_id').val();
            $('#plan').html('<option value="" enabled selected>Loading...</option>');
            
            if (typeId && networkId) {
                // Fetch data plans for selected network and type
                $.ajax({
                    url: '/api/data/plans',
                    method: 'GET',
                    data: { 
                        network_id: networkId,
                        type_id: typeId 
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            let options = '<option value="" enabled selected>Select Data Plan</option>';
                            response.forEach(plan => {
                                options += `<option value="${plan.id}" data-amount="${plan.amount}">${plan.name} - ${plan.validity}</option>`;
                            });
                            $('#plan').html(options).prop('disabled', false);
                        } else {
                            $('#plan').html('<option value="" enabled selected>No plans available</option>');
                        }
                        $('#amountToPay').val('');
                    },
                    error: function() {
                        $('#plan').html('<option value="" enabled selected>Error loading plans</option>');
                    }
                });
            } else {
                $('#plan').html('<option value="" enabled selected>Select type first</option>').prop('disabled', true);
                $('#amountToPay').val('');
            }
        });

        // Data plan selection change handler
        $('#plan').change(function() {
            const selectedOption = $(this).find('option:selected');
            const amount = selectedOption.data('amount');
            
            if (amount) {
                $('#amountToPay').val(amount.toLocaleString());
                $('#actualAmount').val(amount);
            } else {
                $('#amountToPay').val('');
                $('#actualAmount').val('');
            }
        });

        // Phone number validation and network detection
        $('#mobileno').on('input', function() {
            const phoneNumber = $(this).val();
            if (phoneNumber.length === 11) {
                // You can add network detection logic here if needed
                $('#networkResult').text('Valid phone number detected');
            } else {
                $('#networkResult').text('');
            }
        });

        // Form submission handler
        const form = document.getElementById('buyDataForm');
        const submitButton = document.getElementById('buy-data');

        if (form && submitButton) {
            form.addEventListener('submit', function() {
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';
            });
        }

        // Tab persistence
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        } else {
            $('#myTab a[href="#mtn"]').tab('show');
        }
        
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
    });
</script>



@push('page-js')
    <script src="{{ asset('assets/js/data.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Load the active tab from localStorage
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            } else {
                // Set default tab if no active tab is stored
                $('#myTab a[href="#mtn"]').tab('show');
            }
            // Store the active tab in localStorage when clicked
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('buyDataForm');
            const submitButton = document.getElementById('buy-data');

            if (form && submitButton) {
                form.addEventListener('submit', function() {
                    submitButton.disabled = true;
                    submitButton.innerText = 'Processing your request, please wait...';
                });
            }
        });
    </script>
@endpush

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // JavaScript for handling SME modal interactions
        document.addEventListener('DOMContentLoaded', function() {
            // When a plan card is clicked
            document.querySelectorAll('.sme-plan-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    document.querySelectorAll('.sme-plan-card').forEach(c => {
                        c.style.borderColor = '#e0e0e0';
                    });
                    
                    // Add active style to clicked card
                    this.style.borderColor = '#1a4082';
                    this.style.boxShadow = '0 0 0 2px rgba(26, 64, 130, 0.2)';
                    
                    // Here you could update a form with the selected plan
                    // For example:
                    // document.getElementById('selected-plan').value = this.querySelector('.plan-name').textContent;
                });
            });
        });
    </script>
@endpush