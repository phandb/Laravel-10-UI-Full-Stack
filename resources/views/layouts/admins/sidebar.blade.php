<div class="sidenav-header">
  <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
  <a class="navbar-brand m-0" href=" {{ route('candidates.index') }} " >
    {{-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
    {{-- <span class="ms-1 font-weight-bold text-white ">Confirmation Class</span> --}}
  </a>
</div>
<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
  <ul class="navbar-nav">

    {{-- <li class="nav-item">
      <a class="nav-link text-white active bg-gradient-primary" href="{{ route('admins.dashboard') }} ">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">dashboard</i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " href="../pages/tables.html">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">table_view</i>
        </div>
        <span class="nav-link-text ms-1">Tables</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link text-white " href="../pages/billing.html">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">receipt_long</i>
        </div>
        <span class="nav-link-text ms-1">Billing</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " href="../pages/virtual-reality.html">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">view_in_ar</i>
        </div>
        <span class="nav-link-text ms-1">Virtual Reality</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white " href="../pages/rtl.html">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
        </div>
        <span class="nav-link-text ms-1">RTL</span>
      </a>
    </li> --}}
    
    <li class="nav-item mt-3">
      <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Dashboard</h6>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white " href="{{ route('user-profile.edit')}}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">person</i>
        </div>
        <span class="nav-link-text ms-1">Update Profile</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white " href="{{ route('user-password.change') }}">
        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10"> key </i>
        </div>
        <span class="nav-link-text ms-1">Change Password</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link text-white " 
        href="{{ route('logout') }}"
        onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">

        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i class="material-icons opacity-10">logout</i>
        </div>
        <span class="nav-link-text ms-1">Logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
        @csrf
      </form>
    </li>
    
  </ul>
</div>
<div class="sidenav-footer position-absolute w-100 bottom-0 bg-gradient-secondary">
  <div class="mx-3  text-white">

    {{-- <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a> --}}
    {{-- <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a> --}}
    You logged in as: {{ Auth::user()->role }}
  </div>
</div>