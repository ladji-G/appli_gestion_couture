<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <h1 style="color:green; font-size: 40px"><strong>BaDraCouture</strong></h1>
                    </a>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div class="menu">{{ ('Catalogue') }}</div>

                            <div class="menu ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('dashboard_genre','F')">
                            {{ __('Catalogue femme') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('dashboard_genre','H')">
                            {{ __('Catalogue homme') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown-link :href="route('mesure')">
                    <div class="menu"> {{ __('Mesure') }}</div>
                </x-dropdown-link>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown-link :href="route('commande.terminer')">
                    <div class="menu"> {{ __('Mes commandes') }}</div>
                </x-dropdown-link>
            </div>

            

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown-link :href="route('commande.information')">
                    <div class="menu"> {{ __("Plus d'info") }}</div>
                </x-dropdown-link>
            </div>


            

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Deconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Deconnecter') }}
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
        
    </div>
    <div class="dropdown">
        <button type="button" class="btn btn-primary" data-toggle="dropdown">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                echo $_SESSION['nbpanier'];
                ?>
            </span>
        </button>


        <div class="dropdown-menu">
            <div class="row total-header-section">
                @foreach((array) session('cart') as $id => $catalogue)
                @endforeach
            </div>x
            @if(session('cart'))
            @foreach(session('cart') as $id => $catalogue)
            <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                    <img src="{{ asset('storage/') }}/{{ $catalogue['cover_image'] }}" />
                </div>
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                    <p>{{ $catalogue['Nom'] }}</p> <span class="count"> Quantity:{{ $catalogue['quantity'] }}</span>
                </div>
            </div>
            @endforeach
            @endif
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Voir les details</a>
                </div>
            </div>
        </div>
</nav>

<br>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
    @endif

    @yield('content')
</div>


@yield('scripts')
</body>

</html>