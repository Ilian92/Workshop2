@props(['title' => 'Administration'])

<x-layout :title="'Admin - ' . $title" :hideNavigation="false" :hideFooter="false">
    <div class="min-h-screen" style="background-color: #FFF8F0;">
        <div class="container mx-auto px-6 py-8">
            <div class="flex gap-8">
                <!-- Sidebar -->
                <div class="w-1/4">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <nav class="space-y-2">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                                </svg>
                                Dashboard
                            </a>
                            
                            <a href="{{ route('admin.users.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                                Utilisateurs
                            </a>
                            
                            <a href="{{ route('admin.animals.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.animals.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                                Animaux
                            </a>
                            
                            <a href="{{ route('admin.type-animals.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.type-animals.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h.008v.008H6V6z"/>
                                </svg>
                                Types d'animaux
                            </a>
                            
                            <a href="{{ route('admin.produits.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.produits.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
                                </svg>
                                Produits
                            </a>
                            
                            <a href="{{ route('admin.piliers.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.piliers.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                                Piliers
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Page Header -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 font-['Archivo_Black']">{{ $title }}</h2>
                        @if(isset($subtitle))
                            <p class="text-gray-600 mt-1">{{ $subtitle }}</p>
                        @endif
                    </div>

                    <!-- Alerts -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Content -->
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
