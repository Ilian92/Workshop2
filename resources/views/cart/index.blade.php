<x-layout title="Mon Panier">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Mon Panier') }}
                </h2>
            </div>
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if(count($products) > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="space-y-6">
                            @foreach($products as $item)
                                <div class="flex items-center space-x-4 border-b border-gray-200 pb-4">
                                    @if($item['product']->image)
                                        <img src="{{ $item['product']->image }}" 
                                             alt="{{ $item['product']->name }}" 
                                             class="w-20 h-20 object-cover rounded">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded flex items-center justify-center">
                                            <span class="text-gray-500 text-xs">Aucune image</span>
                                        </div>
                                    @endif

                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $item['product']->nom }}</h3>
                                        <p class="text-gray-600 text-sm">{{ $item['product']->descriptionCourte }}</p>
                                        <p class="text-sm text-gray-500">Stock: {{ $item['product']->quantite }}</p>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PUT')
                                            <label for="quantity-{{ $item['product']->id }}" class="text-sm font-medium text-gray-700">Quantité:</label>
                                            <input type="number" 
                                                   id="quantity-{{ $item['product']->id }}"
                                                   name="quantity" 
                                                   value="{{ $item['quantity'] }}" 
                                                   min="1" 
                                                   max="{{ $item['product']->stock }}"
                                                   class="w-16 px-2 py-1 border border-gray-300 rounded text-sm">
                                            <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm">Mettre à jour</button>
                                        </form>

                                        <div class="text-right">
                                            <p class="text-lg font-semibold text-green-600">
                                                {{ number_format($item['subtotal'] / 100, 2) }} €
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ number_format($item['product']->prix / 100, 2) }} € l'unité
                                            </p>
                                        </div>

                                        <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                            <div class="border-t border-gray-200 pt-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Vider le panier</button>
                                        </form>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-green-600">Total: {{ number_format($total / 100, 2) }} €</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center pt-6">
                                <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">← Continuer les achats</a>
                                <a href="{{ route('checkout.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">Procéder au paiement</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="text-gray-500 mb-4">
                            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l9-4 9 4M4 10v7a2 2 0 002 2h12a2 2 0 002-2v-7M4 10l8 4m8-4l-8 4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Votre panier est vide</h3>
                        <p class="text-gray-500 mb-6">Ajoutez des produits à votre panier pour commencer vos achats.</p>
                        <a href="{{ route('products.index') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Voir nos produits
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout> 