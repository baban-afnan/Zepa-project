<style>
    /* Update navigation sidebar color */
    .app-sidebar {
        background-color: #6600cc !important;
    }
    
    /* Update active menu item styles */
    .side-menu__item.active {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
    }
    
    /* Update hover states */
    .side-menu__item:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
    }
    
    /* Update submenu background */
    .slide-menu {
        background-color: #6600cc !important;
    }
    
    /* Update icons color for better contrast */
    .side-menu__icon {
        color: rgba(255, 255, 255, 0.8) !important;
    }
    
    /* Update scroll arrows */
    #slide-left, #slide-right {
        background-color: #6600cc !important;
    }
</style>

<div class="header-element">
                     <!-- Start::header-link|dropdown-toggle -->
                     <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <div class="d-flex align-items-center">
                           <div class="me-sm-2 me-0">
                              @if(Auth::user()->profile_pic != '')
                              <img alt="img" width="32" height="32" class="rounded-circle" src="{{ 'data:image/;base64,'.Auth::user()->profile_pic }}">
                              @else
                              <img alt="img" width="32" height="32" class="rounded-circle" src="{{ asset('assets/images/zepa-logo.jpg') }}" alt="">
                              @endif
                           </div>
                           <div class="d-sm-block d-none">
                              <p class="fw-semibold mb-0 lh-1">{{ substr(Auth::user()->first_name, 0, 10); }}</p>
                              <span class="op-7 fw-normal d-block fs-11">{{ ucwords(Auth::user()->role) }} Account</span>
                           </div>
                        </div>
                     </a>

                     <!-- End::header-link|dropdown-toggle -->
                     <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                         <li><a class="dropdown-item d-flex" href="{{route('profile.edit')}}"><i class="ti ti-settings fs-18 me-2 op-7"></i>Settings</a></li>
                            <li><a class="dropdown-item d-flex" href="{{route('support')}}" target="_blank"><i class="ti ti-headset fs-18 me-2 op-7"></i>Support</a></li>
                        <li><a id="logout" onclick="logout();" class="dropdown-item d-flex" href="#"><i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out</a>
                           <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        </li>
                     </ul>
                  </div>
