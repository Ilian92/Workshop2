<x-admin-layout title="Modifier le type d'animal" subtitle="Modifier les informations du type d'animal">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Modifier {{ $typeAnimal->nom }}</h3>
        </div>
        
        <form action="{{ route('admin.type-animals.update', $typeAnimal) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom du type</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $typeAnimal->nom) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ old('description', $typeAnimal->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.type-animals.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
