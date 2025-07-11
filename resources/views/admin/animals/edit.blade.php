<x-admin-layout title="Modifier l'animal" subtitle="Modifier les informations de l'animal">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Modifier {{ $animal->nom }}</h3>
        </div>
        
        <form action="{{ route('admin.animals.update', $animal) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $animal->nom) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('nom')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="type_animal_id" class="block text-sm font-medium text-gray-700 mb-2">Type d'animal</label>
                    <select name="type_animal_id" id="type_animal_id" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                            required>
                        @foreach($typeAnimals as $type)
                            <option value="{{ $type->id }}" {{ old('type_animal_id', $animal->type_animal_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_animal_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Propriétaire</label>
                    <select name="user_id" id="user_id" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        <option value="">Aucun propriétaire</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $animal->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Âge (en années)</label>
                    <input type="number" name="age" id="age" value="{{ old('age', $animal->age) }}" min="0" max="50" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('age')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="poids" class="block text-sm font-medium text-gray-700 mb-2">Poids (en kg)</label>
                    <input type="number" name="poids" id="poids" value="{{ old('poids', $animal->poids) }}" min="0" step="0.1" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                           required>
                    @error('poids')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent">{{ old('description', $animal->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('admin.animals.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
