<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/iconCouture.png') }}" type="img/x-icon">
    <title>BadraCoutureAppEmploye</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/offcanvas.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <!-- welcome -->
    <link rel="stylesheet" href="/css/welcome.css">
    <!-- client -->
    <link rel="stylesheet" href="/css/clients.css">
    <link rel="stylesheet" href="/css/creerclient.css">
    <!-- employe -->
    <link rel="stylesheet" href="/css/employe.css">
    <!-- catalogue -->
    <link rel="stylesheet" href="/css/catalogues.css">
    <link rel="stylesheet" href="/css/creercatalogues.css">
    <link rel="stylesheet" href="/css/modifcatalogues.css">
    <!-- commande -->
    <link rel="stylesheet" href="/css/commande.css">
    <link rel="stylesheet" href="/css/creercommande.css">
    <!-- Dashboard -->
    <link rel="stylesheet" href="dashboard.css">
    <!-- Login -->
    <link rel="stylesheet" href="/css/login.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('couturier.layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('couturier')
        </main>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="{{ asset('js/offcanvas.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>
</body>

</html>