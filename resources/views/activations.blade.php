@extends('layouts.dashboard')
@section('title', 'activation')
@section('content')
    <div class="page">
        @include('components.app-header')
        @include('components.app-sidebar')
        @include('address.modal')

        <!-- CSS -->
        <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" id="style">

        <!-- Main Content -->
        <div class="main-content app-content">
            <div class="container-fluid">

           
              
                    <div class="col-xxl-12  col-md-12">
                         @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                     Profile Update successful
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
                        <div class="card custom-card mb-4">
                            
                          
<!-- main page content -->
<div class="main-container container pt-0">
    <!-- notification list -->
    <div class="row">
        <div class="col-12 px-0">
            <div class="list-group list-group-flush bg-none">
                <a class="list-group-item bg-white">
                    <div class="row">
                        <div class="col-auto">
                            <div class="card">
                                <div class="card-body p-1">
                                    <div class="avatar avatar-50 coverimg rounded-15">
                                        <img src="assets/images/bvn1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="mb-1"><b>Validate your BVN now</b>, <b> and unlock full access to your account for easy transactions.
                                      Plus, enjoy a withdrawal limit of 
                                 </b> and <b>₦50,000 daily and up to ₦20,000 per transaction!</b>
                                 complete your BVN validation and start transacting freely!</p>
                            <p class="size-12 text-secondary">Level 1</p>
                            <button class="btn btn-default mt-2" data-bs-toggle="modal" data-bs-target="#validateBvnModal">Validate Now</button>
                        </div>
                      </div>
                    </a>
                <div class="list-group-item bg-light text-center py-2 text-mute">Upgrade highier</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="validateBvnModal" tabindex="-1" aria-labelledby="validateBvnModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validateBvnModalLabel">Validate BVN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="bvn" class="form-label">BVN</label>
                        <input type="text" class="form-control" id="bvn" name="bvn" placeholder="Enter your BVN" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Validate</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- main page content -->
<div class="main-container container pt-0">
<!-- Start NIN Validation list -->
<div class="row">
    <div class="col-12 px-0">
        <div class="list-group list-group-flush bg-none">
            <a class="list-group-item bg-white">
                <div class="row">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body p-1">
                                <div class="avatar avatar-50 coverimg rounded-15">
                                    <img src="assets/images/nimc2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="mb-1"><b>Add your NIN now</b>, <b> and unlock full access to your account for easy transactions.
                              Plus, enjoy a withdrawal limit of 
                         </b> and <b>₦50,000 daily and up to ₦20,000 per transaction!</b>
                         complete your BVN validation and start transacting freely!</p>
                        <p class="size-12 text-secondary">Level 2</p>
                        <button class="btn btn-default mt-2" data-bs-toggle="modal" data-bs-target="#validateninModal">Validate Now</button>
                        </div>
                      </div>
                    </a>
                <div class="list-group-item bg-light text-center py-2 text-mute">Upgrade highier</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="validateninModal" tabindex="-1" aria-labelledby="validateNinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validateNinModalLabel">Validate NIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nin" class="form-label">NIN</label>
                        <input type="text" class="form-control" id="nin" name="nin" placeholder="Enter your NIN" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Validate</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- main page content -->
<div class="main-container container pt-0">
<!-- Start NIN Validation list -->
<div class="row">
    <div class="col-12 px-0">
        <div class="list-group list-group-flush bg-none">
            <a class="list-group-item bg-white">
                <div class="row">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body p-1">
                                <div class="avatar avatar-50 coverimg rounded-15">
                                    <img src="assets/images/address.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="mb-1"><b>Add Verify Address</b>, <b> and unlock full access to your account for easy transactions.
                              Plus, enjoy a withdrawal limit of 
                         </b> and <b>unlimited wallet balance and transactions</b>
                         complete your BVN validation and start transacting freely!</p>
                        <p class="size-12 text-secondary">Level 3</p>
                        <button class="btn btn-default mt-2" data-bs-toggle="modal" data-bs-target="#addressModal">Validate Now</button>
                        </div>
                      </div>
                    </a>
                <div class="list-group-item bg-light text-center py-2 text-mute">Upgrade highier</div>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->role != 'agent')
<div class="main-container container pt-0">
    <!-- Start NIN Validation list -->
    <div class="row"></div>
        <div class="col-12 px-0">
            <div class="list-group list-group-flush bg-none">
                <a class="list-group-item bg-white">
                    <div class="row">
                        <div class="col-auto">
                            <div class="card">
                                <div class="card-body p-1">
                                    <div class="avatar avatar-50 coverimg rounded-15">
                                        <img src="assets/images/agent.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="mb-1"><b>Convert to agent</b>, <b> and unlock full access to your account for easy transactions.
                                  Plus, gain access to BVN modification, NIN modification, and other important agency services.
                             </b> and <b>unlimited wallet balance and transactions</b>
                             upgrade your account now and start transacting freely!</p>
                            <p class="size-12 text-secondary">Agent parkage</p>

                            <div class="alert alert-danger alert-dismissible text-center" id="errorMsg" style="display:none;" role="alert">
                                <small id="message">Processing your request.</small>
                            </div>
                            <div class="alert alert-success alert-dismissible text-center" id="successMsg" style="display:none;" role="alert">
                                <small id="smessage">Processing your request.</small>
                            </div>

                            <form id="form" name="form">
                                @csrf
                                <fieldset>
                                    <div class="d-flex align-items-center">
                                        <select id="type" name="type" class="form-select me-2">
                                            <option value="">--- Select Package ---</option>
                                            <option value="agent">Agent Package</option>
                                        </select>
                                        <button type="button" id="upgrade" class="btn btn-default"><i class="las la-sync-alt"></i> Activate Now</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12"></div>
        <button class="btn btn-default btn-lg shadow-sm w-100" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</button>
    </div>
</div>

<!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Here are the terms and conditions...</p>
                <ul>
                    <li>Condition 1: Lorem ipsum dolor sit amet.</li>
                    <li>Condition 2: Consectetur adipiscing elit.</li>
                    <li>Condition 3: Integer nec odio. Praesent libero.</li>
                    <li>Condition 4: Sed cursus ante dapibus diam.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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


   
</div>
@endsection
@endif
