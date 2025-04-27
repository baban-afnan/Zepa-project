@extends('layouts.dashboard')
@section('title', 'Buy Airtime')
@section('content')
    <div class="page">
    <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">


        @include('components.app-header')
        @include('components.app-sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- End::page-header -->

                <!-- Start Our Services-->
    <div class="col-12">
        <div class="card-body">
            <div class="row g-3 justify-content-center">

                @php
                    $services = [
                        ['route' => route('more-services', 'funding'), 'icon' => 'fund.png', 'title' => 'Fund Wallet'],
                        ['route' => route('more-services', 'transfer'), 'icon' => 'transfer.png', 'title' => 'Transfer'],
                        ['route' => route('more-services', 'data'), 'icon' => 'data.png', 'title' => 'Buy Internet Data'],
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
                                                    <i class="bi bi-credit-card"></i></i> Buy Airtime
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <center>
                                                    <img class="img-fluid"
                                                        src="{{ asset('assets/images/network_providers.png') }}"
                                                        width="60%">
                                                </center>

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
                                                        <form id="buyAirtimeForm" name="buy-airtime" method="POST"
                                                            action="{{ route('buyairtime') }}">
                                                            @csrf
                                                            <div class="mb-3 row">
                                                                <div class="col-md-12">
                                                                    <select name="network" class="form-select text-center"
                                                                        aria-label="Default select example">
                                                                        <option value="">Choose Network</option>
                                                                        <option value="mtn">MTN</option>
                                                                        <option value="airtel">AIRTEL</option>
                                                                        <option value="glo">GLO</option>
                                                                        <option value="etisalat">9Mobile</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 mt-2">
                                                                    <p class="mb-2 text-muted">Phone Number</p>
                                                                    <input type="text" id="mobileno"
                                                                        oninput="validateNumber()" name="mobileno"
                                                                        value=""
                                                                        class="form-control phone text-center"
                                                                        maxlength="11" required />
                                                                    <p id="networkResult"></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <p class="mb-2 text-muted">Amount</p>
                                                                    <input type="text" id="amount" name="amount"
                                                                        value="" class="form-control text-center"
                                                                        maxlength="4" required />
                                                                </div>
                                                            </div>
                                                            <button type="submit" id="buy-airtime"
                                                                class="btn btn-primary"><i class="las la-shopping-cart"></i>
                                                                Buy
                                                                Airtime</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Price List Column -->
                            <div class="col-xl-8 col-lg-6">
                                <div class="card">
                                    <div class="card-header border-bottom-0">
                                        <h5 class="card-title mb-0">
                                            <i class="bi bi-tags me-2"></i>Airtime Price List
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info bg-info-transparent mb-4">
                                            <i class="bi bi-megaphone me-2"></i> Take advantage of our competitive rates! Purchase airtime at the best prices available.
                                        </div>
                                        
                                        @if (!$priceList->isEmpty())
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th width="5%">#</th>
                                                            <th>Network</th>
                                                            <th>Minimum Amount</th>
                                                            <th>Maximum Amount</th>
                                                            <th>Discount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $currentPage = $priceList->currentPage();
                                                            $perPage = $priceList->perPage();
                                                            $serialNumber = ($currentPage - 1) * $perPage + 1;
                                                        @endphp
                                                        
                                                        @foreach ($priceList as $data)
                                                            <tr>
                                                                <td>{{ $serialNumber++ }}</td>
                                                                <td>
                                                                    <span class="badge bg-{{ strtolower($data->name) == 'mtn' ? 'warning' : (strtolower($data->name) == 'airtel' ? 'danger' : (strtolower($data->name) == 'glo' ? 'success' : 'info')) }}">
                                                                        {{ $data->name }}
                                                                    </span>
                                                                </td>
                                                                <td>₦{{ number_format($data->amount, 2) }}</td>
                                                                <td>₦5,000.00</td>
                                                                <td>
                                                                    <span class="badge bg-primary">
                                                                        {{ $data->discount ?? '0%' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                                <!-- Pagination -->
                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <div class="text-muted">
                                                        Showing {{ $priceList->firstItem() }} to {{ $priceList->lastItem() }} of {{ $priceList->total() }} entries
                                                    </div>
                                                    <div>
                                                        {{ $priceList->links('vendor.pagination.bootstrap-5') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center py-5">
                                                <img src="{{ asset('assets/images/no-data.svg') }}" alt="No data" class="img-fluid" style="max-width: 250px;">
                                                <h5 class="mt-3 mb-2">No Price List Available</h5>
                                                <p class="text-muted">We currently don't have any airtime price listings. Please check back later.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('page-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.getElementById('buyAirtimeForm');
            if (form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        const submitButton = document.getElementById('buy-airtime');
                        if (submitButton) {
                            submitButton.disabled = true;
                            submitButton.querySelector('.spinner-border').classList.remove('d-none');
                            submitButton.innerHTML = submitButton.innerHTML.replace('Buy Airtime Now', 'Processing...');
                        }
                    }
                    form.classList.add('was-validated');
                }, false);
            }

            // Amount input validation
            const amountInput = document.getElementById('amount');
            if (amountInput) {
                amountInput.addEventListener('input', function() {
                    if (this.value > 5000) {
                        this.value = 5000;
                    } else if (this.value < 50 && this.value !== '') {
                        this.value = 50;
                    }
                });
            }
        });

        function validateNumber() {
            const phoneNumber = document.getElementById('mobileno').value;
            const networkResult = document.getElementById('networkResult');
            
            if (phoneNumber.length >= 4) {
                const prefix = phoneNumber.substring(0, 4);
                let network = '';
                
                // MTN prefixes
                if (['0803', '0806', '0703', '0706', '0810', '0813', '0814', '0816', '0903', '0906'].includes(prefix)) {
                    network = 'MTN';
                } 
                // Airtel prefixes
                else if (['0802', '0808', '0708', '0812', '0902', '0907', '0901'].includes(prefix)) {
                    network = 'AIRTEL';
                }
                // Glo prefixes
                else if (['0805', '0807', '0705', '0811', '0815', '0905'].includes(prefix)) {
                    network = 'GLO';
                }
                // 9Mobile prefixes
                else if (['0809', '0817', '0818', '0908', '0909'].includes(prefix)) {
                    network = '9Mobile';
                }
                
                if (network) {
                    networkResult.innerHTML = `<span class="text-success"><i class="bi bi-check-circle-fill"></i> Detected network: ${network}</span>`;
                } else {
                    networkResult.innerHTML = '<span class="text-warning"><i class="bi bi-exclamation-triangle-fill"></i> Network not recognized</span>';
                }
            } else {
                networkResult.innerHTML = '';
            }
        }
    </script>
@endpush