@extends('layouts.dashboard')
@section('title', 'NIN Verification')
@push('page-css')
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            z-index: 9999;
        }

        #overlay button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #ff5252;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
@endpush
@section('content')

    @include('components.app-header')

    @include('components.app-sidebar')

    <div class="main-content app-content">
        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header  justify-content-between">
                                            <div class="card-title">
                                                <i class="bx bx-fingerprint side-menu__icon"></i> Verify NIN Using Tracking
                                                No.
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="alert alert-danger shadow-sm">
                                                <center><svg class="d-block" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" width="36" height="36"
                                                        fill="currentColor">
                                                        <path
                                                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11V17H13V11H11ZM11 7V9H13V7H11Z">
                                                        </path>
                                                    </svg>
                                                    <p> Note that &#x20A6;{{ $trackingServiceFee->amount }}. fee will be
                                                        deducted
                                                        from your wallet balance for each verification attempt, regardless
                                                        of the outcome. This includes instances where the NIN is not
                                                        successfully verified or if the data is not found.
                                                    <p> Please confirm you have sufficient funds in your wallet before
                                                        proceeding with the verification.
                                                </center>
                                            </div>

                                            <div class="alert alert-danger alert-dismissible text-center" id="errorMsg"
                                                style="display:none;" role="alert">
                                                <small id="message">Processing your request.</small>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <form id="verifyForm" name="verifyForm" method="POST">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <div class="col-md-12 mx-auto">
                                                            </div>
                                                            <div class="col-md-12 ">
                                                                <p class="mb-2 text-muted">Verify Tracking Number</p>
                                                                <input type="text" id="nin" name="trackingId"
                                                                    value="" class="form-control text-center"
                                                                    maxlength="15" required />
                                                            </div>
                                                            <div class="col-md-12 mx-auto">
                                                            </div>
                                                        </div>
                                                        <button type="submit" id="verifyNIN" class="btn btn-primary"><i
                                                                class="lar la-check-circle"></i> Check NIN Details</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        <i class="ri-user-search-line fw-bold"></i> Verified Information
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12  row">
                                        <div class="alert alert-danger alert-dismissible text-center" id="errorMsg2"
                                            style="display:none;" role="alert">
                                            <small id="message2">Processing your request.</small>
                                        </div>
                                        <div class="validation-info  hidden col-md-12 mb-2" id="validation-info">
                                            <center>
                                                <img src="{{ asset('assets/images/search.png') }}" width="20%"
                                                    alt="Search Icon">
                                                <p class="mt-5">This section will display search results </p>
                                            </center>
                                        </div>
                                        <div style="display:none;" id="downloadDiv">
                                            <div class="col-md-12 ">
                                                <div class="btn-list text-center" id="download">
                                                    <a href="#" id="regularSlip" type="button"
                                                        class="btn btn-outline-info btn-wave"><i
                                                            class="bi bi-download"></i>&nbsp; Regular NIN Slip
                                                        (&#x20A6;{{ $regular_nin_fee->amount }})</a>
                                                </div>

                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <center> <span class="text-danger pt-3">To access additional slip formats,
                                                        please
                                                        use your NIN
                                                        number to download from the NIN or phone verification module</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div class="text-center">
            <p>To use this page, pop-ups must be enabled. Please allow pop-ups for this site.</p>
            <button onclick="enablePopups()">Allow Pop-ups</button>
        </div>
    </div>
    <div id="responsive-overlay"></div>
@endsection
@push('page-js')
    <script src="{{ asset('assets/js/nin-track.js') }}"></script>
    <script>
        function enablePopups() {
            const testPopup = window.open('', '_blank', 'width=1,height=1');
            if (testPopup === null || typeof testPopup === 'undefined') {
                alert("Pop-ups are still blocked. Please allow pop-ups in your browser settings.");
            } else {
                // Pop-ups are allowed
                testPopup.close();
                localStorage.setItem('popupsAllowed', 'true');
                document.getElementById('overlay').style.display = 'none';
                window.location.reload();
            }
        }
        window.onload = function() {
            if (localStorage.getItem('popupsAllowed') === 'true') {
                document.getElementById('overlay').style.display = 'none';
                return;
            }
            const testPopup = window.open('', '_blank', 'width=1,height=1');
            if (testPopup === null || typeof testPopup === 'undefined') {
                document.getElementById('overlay').style.display = 'flex';
            } else {
                testPopup.close();
                localStorage.setItem('popupsAllowed', 'true');
                document.getElementById('overlay').style.display = 'none';
            }
        };
    </script>
@endpush
