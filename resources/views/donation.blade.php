@extends('layouts.dashboard')
@section('title', 'Donation payment')
@section('content')
<div class="page">
    @include('components.app-header')
    @include('components.app-sidebar')

    <!-- CSS -->
    <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">
    
    <!-- Main Content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Donation Services Section -->
            <div class="col-12">
                <div class="card custom-card shadow rounded-3 border-0">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold text-dark">Donation Payments</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                            @php
                                $services = [
                                    ['route' => 'javascript:void(0);', 'icon' => 'donate.jpg', 'title' => 'Religous Donation', 'modal' => 'donationModal'],
                                    ['route' => 'javascript:void(0);', 'icon' => 'orphanage.jpg', 'title' => 'Orphanage Donation', 'modal' => 'orphanageModal'],
                                    ['route' => 'javascript:void(0);', 'icon' => 'jamb.png', 'title' => 'Jamb & DE Pin', 'modal' => 'JambModal'],
                                    ['route' => 'javascript:void(0);', 'icon' => 'univeristy.jpg', 'title' => 'Registration Fee', 'modal' => 'UniversityModal'],
                                ];
                            @endphp

                            @foreach($services as $service)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
                                    @if(isset($service['modal']))
                                        <a href="{{ $service['route'] }}" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#{{ $service['modal'] }}">
                                            <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                                <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}" class="mb-2 service-icon">
                                                <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ $service['route'] }}" class="text-decoration-none">
                                            <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                                <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}" class="mb-2 service-icon">
                                                <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Modal -->
            <div class="modal fade modal-enhancement" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content enhanced-modal">
                        <div class="modal-header modal-header-gradient">
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.1rem; transition: all 0.2s ease;"></button>
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
                                <h5 class="modal-title mb-0 text-white" id="donationModalLabel">Make Payment to Organisation</h5>
                            </div>
                        </div>
                        <div class="modal-body px-4 py-4">
                            <div class="text-center mb-4">
                                <div class="modal-icon-container">
                                    <img src="{{ asset('assets/images/donate.jpg') }}" alt="Donation" width="30">
                                </div>
                                <h6 class="fw-bold mb-1">Support Religous Organisation</h6>
                                <p class="text-muted small mb-0">Enter your payment details below</p>
                            </div>
                            <form name="donation-payment" method="POST" action="#" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <select name="organisation" id="organisation_id" class="form-select input-highlight" aria-label="Select Organisation" required>
                                        <option value="" selected disabled>Select organisation</option>
                                        @foreach($organisations ?? [] as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="organisation_id" class="fw-semibold text-center w-100">Organisation</label>
                                    <div class="invalid-feedback text-center">
                                        Please select an organisation
                                    </div>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-center">
                                    <input type="number" min="100" step="1" name="amount" id="amount" class="form-control input-highlight text-center mx-auto" required placeholder="Enter amount" style="max-width: 300px;">
                                    <label for="amount" class="fw-semibold text-center w-100">Amount (₦)</label>
                                    <div class="invalid-feedback text-center">
                                        Please enter an amount (minimum ₦100)
                                    </div>
                                </div>
                                <div class="form-floating mb-4 d-flex justify-content-center">
                                    <input type="text" name="narration" id="narration" class="form-control input-highlight text-center mx-auto" required placeholder="Narration" style="max-width: 300px;">
                                    <label for="narration" class="fw-semibold text-center w-100">Narration</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">
                                        <i class="las la-lock me-2"></i> Submit Payment
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-light justify-content-center">
                            <div class="text-center small text-muted">
                                <i class="las la-shield-alt me-1 text-success"></i> 100% Secure Payment
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orphanage Modal -->
            <div class="modal fade modal-enhancement" id="orphanageModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content enhanced-modal">
                        <div class="modal-header modal-header-gradient">
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.1rem; transition: all 0.2s ease;"></button>
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
                                <h5 class="modal-title mb-0 text-white" id="donationModalLabel">Make Payment to Organisation</h5>
                            </div>
                        </div>
                        <div class="modal-body px-4 py-4">
                            <div class="text-center mb-4">
                                <div class="modal-icon-container">
                                    <img src="{{ asset('assets/images/apps/orphanage.jpg') }}" alt="Donation" width="30">
                                </div>
                                <h6 class="fw-bold mb-1">Support Children and Homes that need you</h6>
                                <p class="text-muted small mb-0">Enter your payment details below</p>
                            </div>
                            <form name="donation-payment" method="POST" action="#" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <select name="organisation" id="organisation_id" class="form-select input-highlight" aria-label="Select Organisation" required>
                                        <option value="" selected disabled>Select organisation</option>
                                        @foreach($organisations ?? [] as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="organisation_id" class="fw-semibold text-center w-100">Organisation</label>
                                    <div class="invalid-feedback text-center">
                                        Please select an organisation
                                    </div>
                                </div>
                                <div class="form-floating mb-3 d-flex justify-content-center">
                                    <input type="number" min="100" step="1" name="amount" id="amount" class="form-control input-highlight text-center mx-auto" required placeholder="Enter amount" style="max-width: 300px;">
                                    <label for="amount" class="fw-semibold text-center w-100">Amount (₦)</label>
                                    <div class="invalid-feedback text-center">
                                        Please enter an amount (minimum ₦100)
                                    </div>
                                </div>
                                <div class="form-floating mb-4 d-flex justify-content-center">
                                    <input type="text" name="narration" id="narration" class="form-control input-highlight text-center mx-auto" required placeholder="Narration" style="max-width: 300px;">
                                    <label for="narration" class="fw-semibold text-center w-100">Narration</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-default btn-lg shadow-sm w-100">
                                        <i class="las la-lock me-2"></i> Submit Payment
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-light justify-content-center">
                            <div class="text-center small text-muted">
                                <i class="las la-shield-alt me-1 text-success"></i> 100% Secure Payment
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blogs -->
<div class="row mb-3">
                <div class="col">
                    <h6 class="title text-center">Other Services </h6>
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
                                    <p class="mb-1">Donate for Religious</p>
                                    <p class="text-muted size-12">
                                        Support Nigerian Muslim, Christian, and all faith-based groups to foster unity, hope, and community impact.
                                    </p></p>
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
                                    <p class="mb-1">Donate to Orphanage</p>
                                    <p class="text-muted size-12">Support orphans—your donation brings smiles, hope, and a brighter future. Give today and make a lasting impact!</p>
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
                                    <p class="mb-1">Donate to International Needy</p>
                                    <p class="text-muted size-12">Support international religious causes—your donation brings hope and blessings to communities in need. Make a difference today!</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- main page content ends -->

         <div class="col-12">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                        </div>
                    </div>
                </div>


        
        <!-- Footer -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            @include('components.footer')
        </footer>
    </div>
    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    
@endsection