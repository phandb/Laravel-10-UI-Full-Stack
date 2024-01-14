<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6> --}}
        @if (session('status'))

      <div class="alert alert-info">
       
          <span class="ms-1 text-white">{{ session('status') }}</span>
              
      </div>
      

      @endif
      </nav>

      <div class="justify-content-end collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
       
        <ul class="navbar-nav  justify-content-end">   
          
          @auth('admin')
          <li class="nav-item d-flex align-items-center">
            
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none font-weight-bold px-1">Welcome Admin: {{ Auth::guard('admin')->user()->name }}</span>
           
          </li>
          
          
          <li class="nav-item d-flex align-items-center">
            <i class="fa fa-sign-out mx-3 me-sm-1" aria-hidden="true"></i>
            <a href="{{ route('logout') }}" 
                class="nav-link text-body font-weight-bold px-0"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              
              <span class="d-sm-inline d-none"> Logout</span>
              
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
            @csrf
            </form>
          </li>
          @else
          <li class="nav-item d-flex align-items-center">
            <a href="{{ route('admin/login') }}" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-sign-in mx-3 me-sm-1"></i>
              <span class="d-sm-inline d-none">Login</span>
            </a>
          </li>

          @endauth
        </ul>


      </div>
    </div>
  </nav>
