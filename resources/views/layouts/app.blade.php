<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="{{ Route::is('login') || Route::is('register') ? "center-mobile" : ""}}">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark main-nav" style="{{ Route::is('login') || Route::is('register') ? "display: none;" : ""}}">
            <div class="container-fluid">
                <a class="navbar-brand " href="/"><img src="../assets/logo-white.png" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0 ">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item me-md-3 my-3 my-md-0">
                                <a class="btn-custom-outline_white nav-link " href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn-custom-solid_white m-auto" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
                            </li>
                        @endif
                    @else

                    <li class="nav-item me-md-3 my-3 my-md-0 d-flex align-items-center">
                        <a class="btn-icon-fill_white {{-- if user has favs change color to red --}}" href="{{ route('ulubione') }}"><x-ri-heart-fill class="icon-avatar icon-heart"/></a>
                    </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <x-radix-avatar class="icon-avatar me-1"/> <span>{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('ulubione') }}">Ulubione</a></li>
                        <li><a class="dropdown-item" href="{{ route('filtry') }}">Zapisane filtry</a></li>
                        <li><a class="dropdown-item" href="{{ route('ustawienia') }}">Ustawienia</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Wyloguj się') }}
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    @endguest
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <main class="bg-white">
            @yield('content')
        </main>
    </div>
</body>
</html>
