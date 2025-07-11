<x-admin-layout title="Détails du produit" subtitle="Informations détaillées du produit">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">{{ $produit->nom }}</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.produits.edit', $produit) }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Modifier
                    </a>
                    <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom</h4>
                    <p class="text-gray-900">{{ $produit->nom }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Prix</h4>
                    <p class="text-gray-900">{{ number_format($produit->prix / 100, 2) }}€</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Stock</h4>
                    <p class="text-gray-900">{{ $produit->stock }} unités</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Statut</h4>
                    <span class="px-2 py-1 text-xs rounded-full {{ $produit->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $produit->is_active ? 'Actif' : 'Inactif' }}
                    </span>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Date de création</h4>
                    <p class="text-gray-900">{{ $produit->created_at->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Dernière modification</h4>
                    <p class="text-gray-900">{{ $produit->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            @if($produit->description)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Description</h4>
                    <p class="text-gray-900">{{ $produit->description }}</p>
                </div>
            @endif
            
            @if($produit->image)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Image</h4>
                    <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="w-64 h-64 object-cover rounded-lg">
                </div>
            @endif
        </div>
    </div>
    
    {{-- Section des images supplémentaires si nécessaire --}}
    @if($produit->images && count($produit->images) > 0)
        <div class="bg-white rounded-lg shadow-sm mt-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Images supplémentaires</h3>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($produit->images as $image)
                        <div class="relative group">
                            <img src="{{ Storage::url('products/' . $image) }}" 
                                 alt="{{ $produit->nom }}" 
                                 class="w-full h-24 object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                <button onclick="removeImage('{{ $image }}')" class="text-white hover:text-red-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-admin-layout>
