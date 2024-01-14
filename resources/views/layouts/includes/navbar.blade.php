<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-dove me-3"></i>Confirmation Class</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
   
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            {{-- <a href="index.html" class="nav-item nav-link active">Home</a>
                                 
          
            <a href="contact.html" class="nav-item nav-link">Contact</a> --}}

            <ul class="navbar-nav ms-auto text-primary">

                @guest
                    @if (Route::has('login'))
                    <li class="nav-item d-flex align-items-center">
                        <i class="fa fa-sign-in  ms-sm-5" aria-hidden="true"></i>
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    </li>
                    @endif

                @else
                    <a href="{{ route('candidates.index') }}" class="nav-item nav-link">Candidates</a>

                    <li class="nav-item dropdown pe-2 d-flex align-items-center justify-content-end">
                        <div href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user ms-sm-5"></i>
                            <span class="d-sm-inline d-none font-weight-bold px-1"> {{ Auth::user()->name }}</span>
                        </div>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4 mt-2" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <i class="fa fa-key  ms-sm-5" aria-hidden="true"></i>
                                <a class="dropdown-item border-radius-md px-1 d-sm-inline d-none " href="javascript:;">
                                    <span class="font-weight-bold ">Change Password</span> 
                                    {{-- <div class="d-flex py-1">
                                        
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                           
                                            </h6>
                                            
                                        </div>
                                    </div> --}}
                                </a>
                            </li>
                            <li class="dropdown-item border-radius-md">
                                <i class="fa fa-sign-out  ms-sm-5" aria-hidden="true"></i>
                                <a href="{{ route('logout') }}" 
                                    class="d-sm-inline d-none font-weight-bold px-1 "
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                  
                                  <span class="d-sm-inline d-none"> Logout</span>
                                  
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                    

                    

                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item  " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}

                @endguest
            </ul>
            
            {{-- <a href="register.html" class="nav-item nav-link">Register</a> --}}
        </div>
       
    </div>
</nav>