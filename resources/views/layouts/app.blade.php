<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DTains') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <style>


    html{
      width: 100%;
    }

    body {

    }

    .container-full {
      /* margin: 0 auto; */
      /* width: 100%; */
    }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('flatIcons/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="heading">

      <user-navigation></user-navigation>

      <div class="logo-container">
        <div class="wrapper">

          <div>
            <span class="flaticon-magnifying-glass-browser"></span>
          </div>

          <div class="logo-wrapper">
            <a class="brand" href="{{ url('/') }}">
            <img class="navLogo" src="{{ asset('images/train_logo.svg') }}" alt="">
            </a>
          </div>

          <div>
            <cart-icon></cart-icon>
          </div>
        </div>
      </div>

      <nav-menu :fontcolor='"hsl(210, 39%, 92%)"' :categories="{{ $categories }}" class="main-menu"></nav-menu>


      <!-- <menu-pop-out></menu-pop-out> -->
    </div>
      <main class="main-container">
          @yield('content')
      </main>
  </div>

  @yield('scripts')


</body>
</html>
