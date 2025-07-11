<nav x-data="{ open: false, profileOpen: false }" class="bg-beige">
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
                    New Arrivals
                </a>
                <a href="{{ route('products.index') }}" 
                   class="nav-link {{ request()->routeIs('products.*') ? 'color-jaune' : '' }}">
                    Catalog 
                </a>
                <a href="#" 
                   class="nav-link">
                    About Us
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
                         class="dropdown-profil absolute right-0 w-48 bg-beige rounded-md p-3 z-50 border border-vert">
                        @auth
                            <a href="{{ route('profile.edit') }}" class="link-dropdown {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                                Profile
                            </a>
                            <a href="{{ route('dashboard') }}" class="link-dropdown {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="link-dropdown w-full text-left">
                                    Sign Out
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="link-dropdown {{ request()->routeIs('login') ? 'active' : '' }}">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="link-dropdown {{ request()->routeIs('register') ? 'active' : '' }}">
                                Sign Up
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
               class="nav-link block {{ request()->routeIs('homepage') ? 'active' : '' }}">
                New Arrivals
            </a>
            <a href="{{ route('products.index') }}" 
               class="nav-link block {{ request()->routeIs('products.*') ? 'active' : '' }}">
                Catalog
            </a>
            <a href="#" 
               class="nav-link block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">
                About Us
            </a>
            <a href="#" 
               class="nav-link block px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">
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
                       class="link-dropdown block {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        Profile
                    </a>
                    <a href="{{ route('dashboard') }}" 
                       class="link-dropdown block {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="link-dropdown block w-full text-left px-3 py-2 text-base font-medium hover:bg-gray-50 rounded-md">
                            Sign Out
                        </button>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <a href="{{ route('login') }}" 
                       class="link-dropdown block {{ request()->routeIs('login') ? 'active' : '' }}">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="link-dropdown block {{ request()->routeIs('register') ? 'active' : '' }}">
                        Sign Up
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
