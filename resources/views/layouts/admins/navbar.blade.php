<nav class="navbar navbar-main navbar-expand-md bg-gray-300" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6> --}}
        <span class="ms-1 font-weight-bold  google-cursive">Confirmation Class</span>
      </nav>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

     
      <div class="justify-content-end collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-4 pe-5" id="navbar">
       
         
        <ul class="navbar-nav  justify-content-end">   
          
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link  text-uppercase mb-0 me-3" href="{{ route('candidates.index') }}">Candidates</a>
          </li>
          {{-- @auth('admin') --}}
          @auth
          <li class="nav-item dropdown d-flex align-items-center pb-2">
            
            <a href="#" class="nav-link text-body dropdown-toggle " id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none font-weight-bold px-1">Welcome {{ Auth::user()->name }}</span>
           
              
            </a>

              
            <ul class="dropdown-menu  dropdown-menu-end   " aria-labelledby="dropdownMenuButton">

                <li class="mb-2" >
                  <i class="fa fa-user  mx-sm-2" aria-hidden="true"></i>
                  <a class="dropdown-item  d-sm-inline d-none @if(request()->routeIs('user-profile.edit')) active @endif "
                       href="{{ route('user-profile.edit') }}">
                      <span class="font-weight-bold ">Update Profile</span> 
                      {{-- <div class="d-flex py-1">
                          
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="text-sm font-weight-normal mb-1">
                             
                              </h6>
                              
                          </div>
                      </div> --}}
                  </a>
                </li>

                <li class=" mb-2" >
                  <i class="fa fa-key  mx-sm-2" aria-hidden="true"></i>
                  <a class="dropdown-item  d-sm-inline d-none @if(request()->routeIs('user-password.change')) active @endif "
                       href="{{ route('user-password.change') }}">
                      <span class="font-weight-bold ">Change Password</span> 
                      
                  </a>
                </li>

                <li class=" mb-2">
                  <i class="fa fa-sign-out mx-sm-2 " aria-hidden="true"></i>
                  <a href="{{ route('logout') }}" 
                      class="dropdown-item d-sm-inline d-none"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    
                    <span class="font-weight-bold "> Logout</span>
                    
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                  @csrf
                  </form>
                </li>
              </ul>

          </li>
          
          
          
          @else
          <li class="nav-item d-flex align-items-center">
            <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-sign-in mx-3 me-sm-1"></i>
              <span class="d-sm-inline d-none">Login</span>
            </a>
          </li>

          @endauth
        </ul>


      </div>
    </div>
  </nav>

 
