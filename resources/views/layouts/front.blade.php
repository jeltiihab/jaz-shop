<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <!-- CSRF Token-->
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <title>
            @yield('title')
        </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

        <!-- Core CSS -->
        <link href="{{ asset('frontend/css/bootstrap5.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('frontend/css/custom.css') }} "  rel="stylesheet"/>
        <link href="{{ asset('frontend/css/owl.carousel.min.css') }} "  rel="stylesheet"/>
        <link href="{{ asset('frontend/css/owl.theme.default.min.css') }} "  rel="stylesheet"/>

    </head> 

  <body>

    @include('layouts.incs.frontnavbar')
    
    <div class="contnt">
        @yield('content')
    </div>
    
    <script src="{{ asset( 'frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset( 'frontend/js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset( 'frontend/js/owl.carousel.min.js') }}" ></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal(" {{ session('status') }}")
        </script>
    @endif
    @yield('script')
  </body>
</html>
