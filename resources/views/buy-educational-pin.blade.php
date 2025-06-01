<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Easy Verifications for your Business">
    <meta name="keywords" content="NIMC, BVN, ZEPA, Verification, Airtime,Data,Bills, Identity">
    <meta name="author" content="Zepa Developers">
    <title>ZEPA Solutions - Buy Educational Pin</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/home/images/favicon/favicon.png') }}" type="image/x-icon">
    
    <!-- CSS -->
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet">
    
    <style>
        .vertical-tabs-2 .nav-item .nav-link.active {
            background-color: #1a4082 !important;
            color: #fff;
            position: relative;
        }
        .vertical-tabs-2 .nav-item .nav-link.active::before {
            content: "";
            position: absolute;
            inset-inline-end: -.5rem;
            inset-block-start: 38%;
            transform: rotate(45deg);
            width: 1rem;
            height: 1rem;
            background-color: #3b5998 !important;
        }
        .vertical-tabs-2 .nav-item .nav-link {
            min-width: 7.5rem;
            max-width: 7.5rem;
            text-align: center;
            border: 1px solid var(--default-border);
            margin-bottom: .5rem;
            color: #fff;
            background-color: #fff;
        }
        @media (max-width: 576px) {
            .custom-margin-top {
                margin-top: -100px !important;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <span class="loader"></span>
    </div>
    
    <div class="page">
        <!-- Header -->
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="{{ route('dashboard') }}" class="header-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="desktop-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="toggle-logo">
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="toggle-dark">
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="desktop-white">
                                <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="toggle-white">
                            </a>
                        </div>
                    </div>
                    <div class="header-element">
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);">
                            <span></span>
                        </a>
                    </div>
                </div>
                
                <div class="header-content-right">
                    <!-- Notification Dropdown -->
                    <div class="header-element notifications-dropdown">
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <i class="bx bx-bell header-link-icon"></i>
                            <span class="badge bg-danger rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">{{ $notifycount }}</span>
                        </a>
                        
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                                    <span class="badge bg-danger-transparent" id="notifiation-data">{{ $notifycount }} Unread</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            
                            <ul class="list-unstyled mb-0" id="header-notification-scroll">
                                @if($notifycount != 0)
                                    <audio src="{{ asset('assets/audio/notification.mp3') }}" autoplay="autoplay"></audio>
                                @endif
                                
                                @forelse($notifications as $data)
                                    <li class="dropdown-item">
                                        <div class="d-flex align-items-start">
                                            <div class="pe-2">
                                                <span class="avatar avatar-md bg-primary-transparent avatar-rounded">
                                                    <i class="ti {{ $data->message_title == 'Account Has Been Verified' ? 'ti-user-check' : 'ti-bell' }} fs-18"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-0 fw-semibold">{{ $data->message_title }}</p>
                                                    <span class="text-muted fw-normal fs-12 header-notification-text">{{ $data->messages }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="p-5 empty-item1">
                                        <div class="text-center">
                                            <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                                <i class="ri-notification-off-line fs-2"></i>
                                            </span>
                                            <h6 class="fw-semibold mt-3">No New Notifications</h6>
                                        </div>
                                    </div>
                                @endforelse
                            </ul>
                            
                            @if($notifycount != 0)
                                <div class="p-3 empty-header-item1 border-top">
                                    <div class="d-grid">
                                        <a id="read" href="#" class="btn btn-primary">Mark as Read</a>
                                        <p style="display:none" id="done" class="text-danger text-center">Marked Read</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @include('components.header')
                </div>
            </div>
        </header>

        
                                            <div class="col-md-12">
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                @if (session('error'))
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                @if ($errors && is_object($errors) && method_exists($errors, 'any') && $errors->any())
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
        
        <!-- Sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">
            <div class="main-sidebar-header">
                <a href="{{ route('dashboard') }}" class="header-logo">
                    <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="desktop-logo">
                    <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="desktop-dark">
                    <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="logo" class="toggle-dark">
                </a>
            </div>
            
            <div class="main-sidebar" id="sidebar-scroll">
                  @include('components.app-sidebar')
                    </div>
                    
                    @php $title="education"; $menu="PINs"; @endphp
                    @include('components.sidebar')
                    
                    <div class="slide-right" id="slide-right">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg>
                    </div>
                </nav>
            </div>
        </aside>

         <div class="col-12">
                <div class="col-12">
                    <div class="card-body">
                        <div class="row g-3 justify-content-center">
                        </div>
                    </div>
                </div>


       <!-- Main Content -->
<div class="main-content app-content custom-margin-top">
    <div class="container-fluid">
        
       <!-- Start Our Services-->
    <div class="col-12">
    <div class="card custom-card shadow rounded-3 border-0">
        <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom-0">
            <h5 class="card-title mb-0 fw-bold text-dark">Educational Services</h5>
        </div>
        <div class="card-body">
            <div class="row g-3 justify-content-center">

                    @php
                        $services = [
                            ['route' => 'javascript:void(0);', 'icon' => 'waec.png', 'title' => 'Waec Pin', 'modal' => 'educationModal'],
                            ['route' => 'javascript:void(0);', 'icon' => 'neco.png', 'title' => 'Neco Pin', 'modal' => 'necoModal'],
                            ['route' => 'javascript:void(0);', 'icon' => 'jamb.png', 'title' => 'Jamb & DE Pin', 'modal' => 'JambModal'],
                            ['route' => 'javascript:void(0);', 'icon' => 'univeristy.jpg', 'title' => 'Registration Fee', 'modal' => 'UniversityModal'],
                        ];
                    @endphp

                    @foreach($services as $service)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-center">
                            @if(isset($service['modal']))
                                <!-- Service with Modal Trigger -->
                                <a href="{{ $service['route'] }}" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#{{ $service['modal'] }}">
                                    <div class="service-box p-3 border rounded-3 shadow-sm h-100 d-flex flex-column align-items-center justify-content-center transition">
                                        <img src="{{ asset('assets/images/apps/' . $service['icon']) }}" alt="{{ $service['title'] }}" class="mb-2 service-icon">
                                        <p class="mb-0 text-white fw-semibold small text-center">{{ $service['title'] }}</p>
                                    </div>
                                </a>
                            @else
                                <!-- Regular Service Link -->
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
</div>

<!-- Education Modal -->
<div class="modal fade" id="educationModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
         <div class="modal-header bg-primary text-white">
            <div class="d-flex align-items-center">
               <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
               <h5 class="modal-title mb-0" id="educationModalLabel">Buy WAEC Pin</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-4 py-4">
            <div class="text-center mb-3">
               <img src="{{ asset('assets/images/pin.png') }}" alt="WAEC Pin" width="80" class="mb-2">
               <p class="text-muted small mb-0">Purchase your WAEC access pin securely and instantly.</p>
            </div>
            <form name="buy-pin" method="POST" action="{{ route('buypin') }}">
               @csrf
               <div class="mb-3">
                  <label for="service_id" class="form-label fw-semibold">Select Service</label>
                  <select name="service" id="service_id" class="form-select text-center" aria-label="Select Service" required>
                     <option value="">Select Service</option>
                     <option value="waec">WAEC Result Checker</option>
                     <option value="waec-registration">WAEC Registration</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="type" class="form-label fw-semibold">Choose Type</label>
                  <select name="type" id="type" class="form-select text-center" aria-label="Choose Type" required>
                     <option value="">Choose Type</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="amountToPay" class="form-label fw-semibold">Amount To Pay</label>
                  <input type="text" id="amountToPay" readonly value="" class="form-control text-center bg-light" style="font-weight:bold; font-size:1.1rem;"/>
               </div>
               <div class="mb-3">
                  <label for="mobileno" class="form-label fw-semibold">Phone Number</label>
                  <input type="text" id="mobileno" name="mobileno" value="" class="form-control phone text-center" maxlength="11" required placeholder="Enter your phone number"/>
               </div>
               <div class="d-grid">
                  <button type="submit" id="buy-pin" class="btn btn-default btn-lg shadow-sm w-100">
                     <i class="las la-shopping-cart me-1"></i> Buy Pin
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>


<!-- Education Modal -->
<div class="modal fade" id="necoModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
         <div class="modal-header bg-primary text-white">
            <div class="d-flex align-items-center">
               <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
               <h5 class="modal-title mb-0" id="educationModalLabel">Buy NECO Pin</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-4 py-4">
            <div class="text-center mb-3">
               <img src="{{ asset('assets/images/apps/neco.png') }}" alt="NECO Pin" width="80" class="mb-2">
               <p class="text-muted small mb-0">Purchase your WAEC access pin securely and instantly.</p>
            </div>
            <form name="buy-pin" method="POST" action="{{ route('buypin') }}">
               @csrf
               <div class="mb-3">
                  <label for="service_id" class="form-label fw-semibold">Select Service</label>
                  <select name="service" id="service_id" class="form-select text-center" aria-label="Select Service" required>
                     <option value="">Select Service</option>
                     <option value="waec">WAEC Result Checker</option>
                     <option value="waec-registration">WAEC Registration</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="type" class="form-label fw-semibold">Choose Type</label>
                  <select name="type" id="type" class="form-select text-center" aria-label="Choose Type" required>
                     <option value="">Choose Type</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="amountToPay" class="form-label fw-semibold">Amount To Pay</label>
                  <input type="text" id="amountToPay" readonly value="" class="form-control text-center bg-light" style="font-weight:bold; font-size:1.1rem;"/>
               </div>
               <div class="mb-3">
                  <label for="mobileno" class="form-label fw-semibold">Phone Number</label>
                  <input type="text" id="mobileno" name="mobileno" value="" class="form-control phone text-center" maxlength="11" required placeholder="Enter your phone number"/>
               </div>
               <div class="d-grid">
                  <button type="submit" id="buy-pin" class="btn btn-default btn-lg shadow-sm w-100">
                     <i class="las la-shopping-cart me-1"></i> Buy Pin
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                

<!-- Jamb Education Modal -->
<div class="modal fade" id="JambModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
         <div class="modal-header bg-primary text-white">
            <div class="d-flex align-items-center">
               <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
               <h5 class="modal-title mb-0" id="educationModalLabel">Buy Jamb and DE Pin</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-4 py-4">
            <div class="text-center mb-3">
               <img src="{{ asset('assets/images/apps/jamb.png') }}" alt="NECO Pin" width="80" class="mb-2">
               <p class="text-muted small mb-0">Purchase your WAEC access pin securely and instantly.</p>
            </div>
            <form name="buy-pin" method="POST" action="{{ route('buypin') }}">
               @csrf
               <div class="mb-3">
                  <label for="service_id" class="form-label fw-semibold">Select Service</label>
                  <select name="service" id="service_id" class="form-select text-center" aria-label="Select Service" required>
                     <option value="">Select Service</option>
                     <option value="waec">WAEC Result Checker</option>
                     <option value="waec-registration">WAEC Registration</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="type" class="form-label fw-semibold">Choose Type</label>
                  <select name="type" id="type" class="form-select text-center" aria-label="Choose Type" required>
                     <option value="">Choose Type</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="amountToPay" class="form-label fw-semibold">Amount To Pay</label>
                  <input type="text" id="amountToPay" readonly value="" class="form-control text-center bg-light" style="font-weight:bold; font-size:1.1rem;"/>
               </div>
               <div class="mb-3">
                  <label for="mobileno" class="form-label fw-semibold">Phone Number</label>
                  <input type="text" id="mobileno" name="mobileno" value="" class="form-control phone text-center" maxlength="11" required placeholder="Enter your phone number"/>
               </div>
               <div class="d-grid">
                  <button type="submit" id="buy-pin" class="btn btn-default btn-lg shadow-sm w-100">
                     <i class="las la-shopping-cart me-1"></i> Buy Pin
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                

<!-- University Education Modal -->
<div class="modal fade" id="UniversityModal" tabindex="-1" aria-labelledby="educationModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg">
         <div class="modal-header bg-primary text-white">
            <div class="d-flex align-items-center">
               <img src="{{ asset('assets/images/brand-logos/logo.png') }}" alt="ZEPA Logo" width="40" class="me-2 rounded-circle shadow-sm">
               <h5 class="modal-title mb-0" id="educationModalLabel">Pay for registration fee</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-4 py-4">
            <div class="text-center mb-3">
               <img src="{{ asset('assets/images/apps/univeristy.jpg') }}" alt="NECO Pin" width="80" class="mb-2">
               <p class="text-muted small mb-0">Purchase your WAEC access pin securely and instantly.</p>
            </div>
            <form name="buy-pin" method="POST" action="{{ route('buypin') }}">
               @csrf
               <div class="mb-3">
                  <label for="service_id" class="form-label fw-semibold">Select Service</label>
                  <select name="service" id="service_id" class="form-select text-center" aria-label="Select Service" required>
                     <option value="">Select Service</option>
                     <option value="waec">WAEC Result Checker</option>
                     <option value="waec-registration">WAEC Registration</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="type" class="form-label fw-semibold">Choose Type</label>
                  <select name="type" id="type" class="form-select text-center" aria-label="Choose Type" required>
                     <option value="">Choose Type</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label for="amountToPay" class="form-label fw-semibold">Amount To Pay</label>
                  <input type="text" id="amountToPay" readonly value="" class="form-control text-center bg-light" style="font-weight:bold; font-size:1.1rem;"/>
               </div>
               <div class="mb-3">
                  <label for="mobileno" class="form-label fw-semibold">Phone Number</label>
                  <input type="text" id="mobileno" name="mobileno" value="" class="form-control phone text-center" maxlength="11" required placeholder="Enter your phone number"/>
               </div>
               <div class="d-grid">
                  <button type="submit" id="buy-pin" class="btn btn-default btn-lg shadow-sm w-100">
                     <i class="las la-shopping-cart me-1"></i> Buy Pin
                  </button>
               </div>
            </form>
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
    
    <!-- JavaScript -->
    <script src="{{ asset('assets/kyc/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/pin.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/logout.js') }}"></script>
</body>
</html>