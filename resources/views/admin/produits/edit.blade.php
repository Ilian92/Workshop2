<x-admin-layout title="Modifier le produit" subtitle="Modifier les informations du produit">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Modifier {{ $produit->nom }}</h3>
        </div>
        
        <form action="{{ route('admin.produits.update', $produit) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom du produit</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $produit->nom) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix (en €)</label>
                    <input type="number" name="prix" id="prix" value="{{ old('prix', $produit->prix / 100) }}" step="0.01" min="0" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('prix')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $produit->stock) }}" min="0" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Statut</label>
                    <select name="is_active" id="is_active" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                            required>
                        <option value="1" {{ old('is_active', $produit->is_active) == 1 ? 'selected' : '' }}>Actif</option>
                        <option value="0" {{ old('is_active', $produit->is_active) == 0 ? 'selected' : '' }}>Inactif</option>
                    </select>
                    @error('is_active')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ old('description', $produit->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image principale</label>
                    @if($produit->image)
                        <div class="mb-4">
                            <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 mt-2">Image actuelle</p>
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                    <p class="mt-1 text-sm text-gray-500">Formats acceptés : JPG, PNG, WebP (max 2MB). Laissez vide pour conserver l'image actuelle.</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
