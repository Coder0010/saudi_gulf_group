<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (app()->isProduction())
        <title>{{ config('app.name') }}</title>
    @else
        <title>backend</title>
    @endif
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('backend/compiled.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('backend.index') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('backend.clients.index') }}">clients</a>
                            </li><!-- clients -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('backend.portfolios.index') }}">portfolios</a>
                            </li><!-- portfolios -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('backend.services.index') }}">services</a>
                            </li><!-- services -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('backend.leads.index') }}">leads</a>
                            </li><!-- leads -->
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('backend.login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('backend.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('backend.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('backend.register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('backend.logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('backend.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @include('flashs')
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('backend/compiled.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
