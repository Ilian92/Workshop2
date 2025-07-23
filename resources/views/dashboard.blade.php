<x-layout title="My Dashboard">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->first_name ?? Auth::user()->name }}!</h1>
            <p class="text-gray-600 mt-2">Here's an overview of your activity</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">My Animals</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['my_animals'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['my_orders'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Spent</p>
                        <p class="text-2xl font-bold text-gray-900">€{{ number_format($stats['total_spent'], 2) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Recent Orders</p>
                        <p class="text-sm text-gray-500">Last 30 days</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['recent_orders_count'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- My Animals -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">My Animals</h3>
                        <a href="{{ route('animals.index') }}" class="text-primary-600 hover:text-primary-800 text-sm">View all</a>
                    </div>
                </div>
                <div class="p-6">
                    @if($myAnimals->count() > 0)
                        <div class="space-y-4">
                            @foreach($myAnimals as $animal)
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $animal->nom }}</p>
                                        <p class="text-sm text-gray-500">{{ $animal->typeAnimal->nom }} • {{ $animal->age }} years old</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">{{ $animal->created_at->format('M d') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                            </svg>
                            <p class="text-gray-500 mt-2">No animals yet</p>
                            <a href="{{ route('animals.create') }}" class="text-primary-600 hover:text-primary-800 text-sm mt-2 inline-block">Add your first animal</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Orders</h3>
                        <a href="{{ route('orders.index') }}" class="text-primary-600 hover:text-primary-800 text-sm">View all</a>
                    </div>
                </div>
                <div class="p-6">
                    @if($myOrders->count() > 0)
                        <div class="space-y-4">
                            @foreach($myOrders as $order)
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium text-gray-900">Order #{{ $order->id }}</p>
                                        <p class="text-sm text-gray-500">{{ $order->produits->count() }} item(s)</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-gray-900">€{{ number_format($order->total / 100, 2) }}</p>
                                        <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c-.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                            </svg>
                            <p class="text-gray-500 mt-2">No orders yet</p>
                            <a href="{{ route('products.index') }}" class="text-primary-600 hover:text-primary-800 text-sm mt-2 inline-block">Browse products</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('animals.create') }}" class="block w-full bg-primary-600 text-white text-center py-3 px-4 rounded-lg hover:bg-primary-700 transition-colors">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add New Animal
                        </a>
                        <a href="{{ route('products.index') }}" class="block w-full bg-gray-100 text-gray-700 text-center py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            Browse Products
                        </a>
                        <a href="{{ route('profile.edit') }}" class="block w-full bg-gray-100 text-gray-700 text-center py-3 px-4 rounded-lg hover:bg-gray-200 transition-colors">
                            <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Recommended Products</h3>
                    <a href="{{ route('products.index') }}" class="text-primary-600 hover:text-primary-800 text-sm">View all products</a>
                </div>
            </div>
            <div class="p-6">
                @if($recommendedProducts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommendedProducts as $product)
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <div class="aspect-w-16 aspect-h-12">
                                    <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="w-full h-48 object-cover">
                                </div>
                                <div class="p-4">
                                    <h4 class="font-medium text-gray-900 mb-2">{{ $product->nom }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ $product->descriptionCourte }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-primary-600">€{{ number_format($product->prix / 100, 2) }}</span>
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">{{ $product->typeAnimal->nom }}</span>
                                    </div>
                                    <a href="{{ route('products.show', $product) }}" class="block w-full mt-3 bg-primary-600 text-white text-center py-2 px-4 rounded-lg hover:bg-primary-700 transition-colors text-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <p class="text-gray-500 mt-2">No products available</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
