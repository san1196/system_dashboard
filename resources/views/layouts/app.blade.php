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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <?php
                            $auth = Auth::user()->role_id;
                            $role = DB::table('master_role as a')->where('a.id',$auth)->join('master_role_menu as b','b.role_id','=','a.id')->leftJoin('master_list_menu as c','c.id','=','b.menu_id')->select('c.url_link')->get();
                        ?>
                            @foreach($role as $value)
                                @if($value->url_link == '/dashboard')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                @endif
                                @if($value->url_link == '/datakaryawan')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('datakaryawan') }}">{{ __('Data Karyawan') }}</a>
                                    </li>
                                @endif
                                @if($value->url_link == '/masterrole')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('masterrole') }}">{{ __('Master Role') }}</a>
                                    </li>
                                @endif
                                @if($value->url_link == '/mastermenu')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('mastermenu') }}">{{ __('Master Menu') }}</a>
                                    </li>
                                @endif
                                @if($value->url_link == '/masterrolemenu')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('masterrolemenu') }}">{{ __('Master Role Menu') }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
