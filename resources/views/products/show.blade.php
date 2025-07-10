<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Image du produit -->
                        <div>
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg">
                            @else
                                <div class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-lg">
                                    <span class="text-gray-500 text-lg">Aucune image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Informations du produit -->
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->nom }}</h1>
                            
                            <div class="mb-6">
                                <span class="text-4xl font-bold text-green-600">{{ number_format($product->prix, 2) }} €</span>
                            </div>

                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $product->descriptionLongue }}</p>
                            </div>

                            <div class="mb-6">
                                <span class="text-sm text-gray-500">
                                    Stock disponible: <span class="font-semibold">{{ $product->quantite }}</span> unités
                                </span>
                            </div>

                            @if($product->quantite > 0)
                                <form action="{{ route('cart.add', $product) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                            Quantité
                                        </label>
                                        <input type="number" 
                                               id="quantity" 
                                               name="quantity" 
                                               value="1" 
                                               min="1" 
                                               max="{{ $product->quantite }}"
                                               class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    
                                    <button type="submit" 
                                            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                                        Ajouter au panier
                                    </button>
                                </form>
                            @else
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                    Ce produit est actuellement en rupture de stock.
                                </div>
                            @endif

                            <div class="mt-6">
                                <a href="{{ route('products.index') }}" 
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    ← Retour aux produits
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 