<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Security System') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Scripts -->
    <script src="{{ asset('js/appp.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{mix('js/app.js')}}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
            <div id="app" class="wrapper bg-light">
                @guest
                @yield('content')
                @else
                @include('layouts.sidebar')
                <div class="main">
                    @include('layouts.navbar')
                    @include('sweetalert::alert')
                    <main class="content py-4">
                        @yield('content')
                    </main>
                </div> 
                @endguest       
            </div>

        <script src="js/app.js"></script>
        @include('sweetalert::alert')
</body>
</html>
