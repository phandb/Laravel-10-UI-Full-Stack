<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container">
    <a class="navbar-brand" href="#">
      <h1 class="text-primary m-0"><i class="fa fa-dove me-3"></i>Confirmation Class</h1>
  </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav ">

      @guest
          @if (Route::has('login'))
          <li class="nav-item d-flex align-items-center text-primary">
              <i class="fa fa-sign-in  ms-sm-5" aria-hidden="true"></i>
              <a href="{{ route('login') }}" class="nav-item nav-link text-primary">Login</a>
          </li>
          @endif
      @else
        <li class="nav-item">
          <a class="nav-link active text-primary" aria-current="page" href="{{ route('candidates.index') }}">Candidate</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
              <li>
                  <i class="fa fa-key  mx-sm-4" aria-hidden="true"></i>
                  <a class="dropdown-item text-primary" 
                      href="{{ route('user-password.change') }}">Change Password
                  </a>
              </li>
              <li>
                  
                  <i class="fa fa-sign-out  mx-sm-4" aria-hidden="true"></i>
                  <a class="dropdown-item d-sm-inline d-none" 
                      href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                              
              </li>
            
          </ul>
        </li>

        @endguest
      </ul>
    </div>
  </div>
</nav>