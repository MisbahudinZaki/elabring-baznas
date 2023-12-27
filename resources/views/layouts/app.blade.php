<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ELABRING</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <button style="width: 7%" class="btn btn-mb btn-light" id="toggle-sidebar"><i class="fas fa-sliders-h"></i></button>
            <div class="container">

                <a class="navbar-brand" href="https://baznas.pasamankab.go.id/" target="_blank">
                   BAZNAS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-alt"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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



        <div id="content">
        <main class="py-4">

        <div id="sidebar">
            <button class="btn btn-mb btn-light" id="hide-sidebar" align="center"><i class="fas fa-sliders-h"></i></button>
            <hr>
            <p><img src="gambar/Logo baznas.jpg" alt="logo" width="70">
                BAZNAS KAB. PASAMAN
                </p>
                <hr>
                <div class="text-center">
                    <p><a style="width: 100%;" class="btn btn-primary" href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a></p>
                    <p><a style="width: 100%;" class="btn btn-light" href="{{route('beranda.index')}}"><i class="fas fa-border-all"></i> PRESENSI</a></p>
                    <p></p>

            </div>

            <div class="container">
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('changepassword')}}"><i class="fas fa-edit"></i> GANTI PASSWORD</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('user.index')}}"><i class="fas fa-users"></i> USERS</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('about')}}"><i class="far fa-building"></i> ABOUT</a></p>

            </div>

        </div>

            @include('sweetalert::alert')

            @yield('content')
        </main>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

     <!-- Include custom script -->
     <script src="{{ asset('js/jam.js') }}"></script>

     <script src="{{ asset('js/custom.js') }}"></script>

     <script src="{{ asset('js/sidebar.js') }}"></script>

     <script src="{{ asset('js/date.js') }}"></script>

     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="js/myscript.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
