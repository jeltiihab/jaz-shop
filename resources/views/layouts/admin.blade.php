<!-- https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/html/index.html -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


    <!-- Icons. Uncomment required icon fonts -->
    <!-- <link rel="stylesheet" href="{{ asset('admin/css/boxicons.css') }}" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/core.css') }}"  class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/css/demo.css') }} " />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.css') }} " />

    <link rel="stylesheet" href="{{ asset('admin/css/apex-charts.css') }}" />


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container" >

      <!-- Menu -->
           @include("admin/inc/asidebar")
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
             @include("admin/inc/adminnav")
          <!-- / Navbar -->


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include("admin/inc/adminfooter")
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset( 'admin/js/jquery.js') }}" defer></script>
    <script src="{{ asset( 'admin/js/popper.js') }} " defer></script>
    <script src="{{ asset( 'admin/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset( 'admin/js/perfect-scrollbar.js') }}" defer></script>

    <script src="{{ asset( 'admin/js/menu.js') }}" defer></script>

    <!-- Sweet Alert JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal(" {{ session('status') }}")
        </script>

    @endif

    <!-- Main JS -->
     <!-- <script src="{{ asset( 'admin/js/main.js') }}" defer></script>  -->

    <!-- Page JS -->
    <!-- <script src="{{ asset( 'admin/js/dashboards-analytics.js') }}" defer></script> -->

     <!-- Helpers -->
     <script src="{{ asset( 'admin/js/helpers.js') }}" defer></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset( 'admin/js/config.js') }}" defer></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->

    @yield('scrpits')
  </body>
</html>
