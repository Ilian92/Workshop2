<x-admin-layout title="Nouveau produit" subtitle="Créer un nouveau produit">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Créer un nouveau produit</h3>
        </div>
        
        <form action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom du produit</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                    @error('nom')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="prix" class="block text-sm font-medium text-gray-700 mb-2">Prix (en €)</label>
                    <input type="number" name="prix" id="prix" value="{{ old('prix') }}" step="0.01" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                    @error('prix')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Quantité en stock</label>
                    <input type="number" name="quantite" id="quantite" value="{{ old('quantite', 0) }}" min="0" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                    @error('quantite')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="type_animal_id" class="block text-sm font-medium text-gray-700 mb-2">Type d'animal</label>
                    <select name="type_animal_id" id="type_animal_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                        <option value="">Sélectionner un type</option>
                        @foreach($typeAnimals as $type)
                            <option value="{{ $type->id }}" {{ old('type_animal_id') == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                    @error('type_animal_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="pilier_id" class="block text-sm font-medium text-gray-700 mb-2">Pilier</label>
                    <select name="pilier_id" id="pilier_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                        <option value="">Sélectionner un pilier</option>
                        @foreach($piliers as $pilier)
                            <option value="{{ $pilier->id }}" {{ old('pilier_id') == $pilier->id ? 'selected' : '' }}>{{ $pilier->nom }}</option>
                        @endforeach
                    </select>
                    @error('pilier_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image principale</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Images supplémentaires</label>
                    <input type="file" name="images[]" id="images" accept="image/*" multiple class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    @error('images')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="descriptionCourte" class="block text-sm font-medium text-gray-700 mb-2">Description courte</label>
                    <input type="text" name="descriptionCourte" id="descriptionCourte" value="{{ old('descriptionCourte') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>
                    @error('descriptionCourte')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="md:col-span-2">
                    <label for="descriptionLongue" class="block text-sm font-medium text-gray-700 mb-2">Description longue</label>
                    <textarea name="descriptionLongue" id="descriptionLongue" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" required>{{ old('descriptionLongue') }}</textarea>
                    @error('descriptionLongue')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">Annuler</a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">Créer le produit</button>
            </div>
        </form>
    </div>
</x-admin-layout>
