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
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Quantité en stock</h4>
                    <p class="text-gray-900">{{ $produit->quantite }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Type d'animal</h4>
                    <p class="text-gray-900">{{ $produit->typeAnimal->nom ?? '' }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Pilier</h4>
                    <p class="text-gray-900">{{ $produit->pilier->nom ?? '' }}</p>
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
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-700 mb-2">Description courte</h4>
                <p class="text-gray-900">{{ $produit->descriptionCourte }}</p>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-700 mb-2">Description longue</h4>
                <div class="text-gray-900 whitespace-pre-wrap">{{ $produit->descriptionLongue }}</div>
            </div>
            
            @if($produit->image)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Image principale</h4>
                    <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="h-32">
                </div>
            @endif
            
            @if($produit->images)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Images supplémentaires</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($produit->images as $img)
                            <img src="{{ asset('storage/products/' . $img) }}" alt="Image supplémentaire" class="h-16">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
