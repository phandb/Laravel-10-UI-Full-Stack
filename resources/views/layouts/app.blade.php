
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @include('layouts/includes.head')


</head>
<body>
    <div id="app">

       
            
      {{-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

        @include('layouts/includes.sidebar')
        
      </aside> --}}

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0  bg-dark">
            {{--  navbar --}}
            @include('layouts/includes.navbar')

            {{-- header picture --}}

            @include('layouts/includes.header')
        </div>
        <!-- Navbar & Hero End -->


        {{-- Dynamic main content goes here --}}
        <main class="py-5" >
            @yield('content')
        </main>
    

    <!-- Footer Start -->
        @include('layouts/includes.footer')
    </div>

</body>
</html>
