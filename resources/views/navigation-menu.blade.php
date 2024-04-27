<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Hlavné navigačné menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img class="block h-10 w-auto" src="{{ asset('images/header_logo3.png') }}" alt="Offered Logo">
                    </a>
                </div>

                <!-- Navigačné odkazy -->

            </div>

            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Nastavenia Dropdown -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Správa účtu -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Správa účtu') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profil') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('advertisements.create') }}">
                                    {{ __('Ponúknuť') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API tokeny') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200"></div>

                                <!-- Odhlásenie -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                        {{ __('Odhlásiť sa') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                <div class="flex">
                    @if (Route::has('login'))
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pe-4">
                            <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                {{ __('Prihlásiť sa') }}
                            </x-nav-link>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex pe-4">
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                {{ __('Registrovať sa') }}
                            </x-nav-link>
                        </div>
                    @endif
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responzívne navigačné menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Responzívne možnosti nastavení -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Správa účtu -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('advertisements.create') }}" :active="request()->routeIs('advertisements.create')">
                        {{ __('Ponúknuť') }}
                    </x-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API tokeny') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Odhlásenie -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                            {{ __('Odhlásiť sa') }}
                        </x-responsive-nav-link>
                    </form>

                </div>
            @else
                @if (Route::has('login'))
                    <x-responsive-nav-link href="{{ route('login') }}"  :active="request()->routeIs('login')">
                        {{ __('Prihlásiť sa') }}
                    </x-responsive-nav-link>
                @endif

                @if (Route::has('register'))
                    <x-responsive-nav-link href="{{ route('register') }}"  :active="request()->routeIs('register')">
                        {{ __('Registrovať sa') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>
    </div>
</nav>
