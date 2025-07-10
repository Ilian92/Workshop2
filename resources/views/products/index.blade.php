<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nos Produits') }}
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Aucune image</span>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->nom }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $product->descriptionCourte }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold text-green-600">{{ number_format($product->prix/100, 2) }} €</span>
                                <span class="text-sm text-gray-500">Stock: {{ $product->quantite }}</span>
                            </div>

                            <div class="flex space-x-2">
                                <a href="{{ route('products.show', $product) }}" 
                                   class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                                    Voir détails
                                </a>
                                
                                @if($product->quantite > 0)
                                    <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" 
                                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Ajouter
                                        </button>
                                    </form>
                                @else
                                    <button disabled 
                                            class="flex-1 bg-gray-400 text-white font-bold py-2 px-4 rounded cursor-not-allowed">
                                        Rupture
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 