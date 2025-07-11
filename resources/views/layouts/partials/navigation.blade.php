<nav x-data="{ open: false, profileOpen: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center nav-content">
            <div class="flex items-center">
                <a href="{{ route('homepage') }}" class="flex items-center">
                    <span class="logo-apwap">APWAP</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('homepage') }}" 
                   class="nav-link {{ request()->routeIs('homepage') ? 'color-jaune' : '' }}">
                    Nouveautés
                </a>
                <a href="{{ route('products.index') }}" 
                   class="nav-link {{ request()->routeIs('products.*') ? 'color-jaune' : '' }}">
                    Catalogue
                </a>
                <a href="#" 
                   class="nav-link">
                    À propos
                </a>
                <a href="#" 
                   class="nav-link">
                    Contact
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="relative p-2 color-noir hover:color-vert transition-colors">
                    <img src="{{ asset('images/icons/icon-cart.svg') }}" alt="Panier" class="w-6 h-6">
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                <div class="relative" x-data="{ profileOpen: false }">
                    <button @click="profileOpen = !profileOpen" class="p-2 color-noir hover:color-vert transition-colors focus:outline-none">
                        <img src="{{ asset('images/icons/icon-profil.svg') }}" alt="Profil" class="w-6 h-6">
                    </button>

                    <div x-show="profileOpen" 
                         @click.away="profileOpen = false" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
                        @auth
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Profil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Se déconnecter
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Connexion
                            </a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Inscription
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <div class="md:hidden flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="relative p-2 color-noir hover:color-vert transition-colors">
                    <img src="{{ asset('images/icons/icon-cart.svg') }}" alt="Panier" class="w-6 h-6">
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                <button @click="open = !open" class="p-2 color-noir hover:color-vert focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('homepage') }}" 
               class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md {{ request()->routeIs('homepage') ? 'text-green-600 bg-green-50' : '' }}">
                Nouveautés
            </a>
            <a href="{{ route('products.index') }}" 
               class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md {{ request()->routeIs('products.*') ? 'text-green-600 bg-green-50' : '' }}">
                Catalogue
            </a>
            <a href="#" 
               class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                À propos
            </a>
            <a href="#" 
               class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                Contact
            </a>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-200">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" 
                       class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                        Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="block w-full text-left px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <a href="{{ route('login') }}" 
                       class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block px-3 py-2 text-base font-medium color-noir hover:color-vert hover:bg-gray-50 rounded-md">
                        Inscription
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
