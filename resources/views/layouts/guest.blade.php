<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/login.css">

        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ">
         <!-- Custom styles for this template -->
        <link href="{{ asset('css/offcanvas.css')}}" rel="stylesheet">
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="back font-sans text-gray-900 antialiased">
        <div class="back min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="back1">
                {{ $slot }}
            </div>
        </div>
        <div class="container">
            
            @yield('content')
        </div>
            
            @yield('scripts')
        <script src="{{ asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        <script src="{{ asset('js/offcanvas.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
    </body>
</html>
