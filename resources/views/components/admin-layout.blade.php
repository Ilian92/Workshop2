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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                </svg>
                                Dashboard
                            </a>
                            
                            <a href="{{ route('admin.users.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-8.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                </svg>
                                Utilisateurs
                            </a>
                            
                            <a href="{{ route('admin.animals.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.animals.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.5a1.5 1.5 0 011.5 1.5V12h-3V10.5z"/>
                                </svg>
                                Animaux
                            </a>
                            
                            <a href="{{ route('admin.type-animals.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.type-animals.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Types d'animaux
                            </a>
                            
                            <a href="{{ route('admin.produits.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.produits.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                Produits
                            </a>
                            
                            <a href="{{ route('admin.piliers.index') }}" 
                               class="flex items-center px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100 transition-colors {{ request()->routeIs('admin.piliers.*') ? 'bg-gray-100 font-semibold' : '' }}">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
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
