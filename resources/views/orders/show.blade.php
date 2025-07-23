<x-layout title="Order Details">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Order #{{ $order->id }}</h1>
                    <p class="text-gray-600 mt-2">Placed on {{ $order->created_at->format('F d, Y \a\t H:i') }}</p>
                </div>
                <a href="{{ route('orders.index') }}" class="text-primary-600 hover:text-primary-800 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Orders
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Order Items</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            @foreach($order->produits as $produit)
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $produit->image }}" alt="{{ $produit->nom }}" class="h-16 w-16 rounded-lg object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900">{{ $produit->nom }}</h4>
                                        <p class="text-sm text-gray-500">{{ $produit->descriptionCourte }}</p>
                                        <p class="text-xs text-gray-400 mt-1">For {{ $produit->typeAnimal->nom }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">Qty: {{ $produit->pivot->quantite ?? 1 }}</p>
                                        <p class="text-sm text-gray-500">€{{ number_format($produit->prix / 100, 2) }} each</p>
                                        <p class="text-sm font-medium text-gray-900">€{{ number_format(($produit->prix * ($produit->pivot->quantite ?? 1)) / 100, 2) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Order Summary</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Subtotal</span>
                                <span class="text-sm text-gray-900">€{{ number_format($order->total / 100, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Shipping</span>
                                <span class="text-sm text-gray-900">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Tax</span>
                                <span class="text-sm text-gray-900">Included</span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span class="text-base font-medium text-gray-900">Total</span>
                                <span class="text-base font-medium text-gray-900">€{{ number_format($order->total / 100, 2) }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="ml-2 text-sm font-medium text-green-800">Order Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Information -->
                <div class="bg-white rounded-lg shadow-sm mt-6">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Delivery Information</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                                <p class="text-sm text-gray-600">{{ $order->user->email }}</p>
                                @if($order->user->phone)
                                    <p class="text-sm text-gray-600">{{ $order->user->phone }}</p>
                                @endif
                            </div>
                            @if($order->user->address)
                                <div>
                                    <p class="text-sm text-gray-600">{{ $order->user->address }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-lg shadow-sm mt-6">
                    <div class="p-6">
                        <div class="space-y-3">
                            <button class="w-full bg-primary-600 text-white py-2 px-4 rounded-lg hover:bg-primary-700 transition-colors text-sm font-medium">
                                Reorder Items
                            </button>
                            <button class="w-full bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                                Download Invoice
                            </button>
                            <button class="w-full bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                                Contact Support
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
