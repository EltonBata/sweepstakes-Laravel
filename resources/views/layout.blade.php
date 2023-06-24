<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="row">
        <div class="col-md-2 p-0">
            <nav class="navbar bg-danger border-end shadow p-3 sidebar justify-content-center">

                <a class="navbar-brand text-white fw-bold w-100 ms-3 text-center" href="#">Sweepstakes</a>

                <!-- Links -->
                <ul class="navbar-nav nb1 w-75">
                    <li class="nav-item my-3 rounded-2" @style(['background-color: #991c28' => $home])>
                        <a class="nav-link text-white text-center" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item my-3 rounded-2" @style(['background-color: #991c28' => $perfil])>
                        <a class="nav-link text-white text-center" href="{{ route('user.index') }}">Perfil</a>
                    </li>
                  
                </ul>

                <ul class="navbar-nav nb2 w-75">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">

                            @csrf

                            <button type="submit" class="nav-link text-white text-center w-100 border rounded-2">Logout</button>
                        </form>

                    </li>
                </ul>

            </nav>

        </div>

        <div class="col-md-10 main  p-0">
            @yield('content')
        </div>
    </div>

</body>

</html>
