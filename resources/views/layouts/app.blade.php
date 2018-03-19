<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">        
                @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  @yield('scripts')
</body>
</html>
