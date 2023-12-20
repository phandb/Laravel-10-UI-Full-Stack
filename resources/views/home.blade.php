@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}


<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0" >
      <div class="row" >
        <div class="col-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4" >
            <div class="container-fluid ps-2 pe-0" >
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                  
                  
                  <li class="nav-item">
                    <a class="nav-link me-2" href="../pages/sign-up.html">
                      <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-2" href="../pages/sign-in.html">
                      <i class="fas fa-key opacity-6 text-dark me-1"></i>
                      Sign In
                    </a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div>


    {{-- <main class="main-content  mt-0"> --}}
      
    {{-- </main> --}}


    <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('assets/img/holy_spirit.png');
          max-width: 100%;
          height: 600;
          background-repeat: no-repeat;
          "></div>
    <!-- Background image -->
  
    {{-- <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          "> --}}
     
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
  
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                      <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                      <div class="row mt-3">
  
                        
                      </div>
                    </div>
                  </div>
  
                  <div class="card-body">
                    <form role="form" class="text-start">
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control">
                      </div>
                      <div class="form-check form-switch d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                      </div>
                      <p class="mt-4 text-sm text-center">
                        Don't have an account?
                        <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Register</a>
                      </p>
                    </form>
                  </div>
  
                </div>
              </div>

    </div>

    
  </section>
  <!-- Section: Design Block -->
  <footer class="footer position-absolute bottom-2 py-2 w-100">
    <div class="container">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-12 col-md-6 my-auto">
          <div class="copyright text-center text-sm text-white text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            Created by <i class="fa fa-heart" aria-hidden="true"></i> Dalton Phan
            
            
          </div>
        </div>
        <div class="col-12 col-md-6">
          
        </div>
      </div>
    </div>
  </footer>


    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  </body>
  



  @endsection
