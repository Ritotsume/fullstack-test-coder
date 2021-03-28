<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Fullstack Coderockr') }}</title>

  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  <link href="{{ asset('css/panel/app.css') }}" rel="stylesheet">
</head>
<body>
  <span id="page-top"></span>
  <div id="wrapper">
    @include('dashboard.inc.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('dashboard.inc.topbar')
        <div class="container-fluid">
          @if ($errors->any())
          <x-dashboard.alert type="danger" title="Oops! Aconteceu algo errado!" message="Verifique os erros e tente novamente:" :errors="$errors" />
          @endif

          @if ($message = Session::get('success'))
          <x-dashboard.alert type="success" title="Tudo ocorreu conforme esperado!" :message="$message" />
          @endif
        </div>
        @yield('panel-content')
      </div>
      @include('dashboard.inc.footer')
    </div>
  </div>
  @include('dashboard.inc.totop')
  <script src="{{ asset('js/panel/app.js') }}" defer></script>
</body>
</html>
