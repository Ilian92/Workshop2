<x-layout title="Add New Animal">
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Add New Animal</h1>
                    <p class="text-gray-600 mt-2">Add your beloved pet to get personalized recommendations</p>
                </div>
                <a href="{{ route('animals.index') }}" class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to My Animals
                </a>
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <form action="{{ route('animals.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('nom') border-red-500 @enderror"
                                       placeholder="Enter your pet's name" required>
                                @error('nom')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="dateNaissance" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth *</label>
                                <input type="date" id="dateNaissance" name="dateNaissance" value="{{ old('dateNaissance') }}" 
                                       max="{{ date('Y-m-d') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('dateNaissance') border-red-500 @enderror"
                                       required>
                                @error('dateNaissance')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="race" class="block text-sm font-medium text-gray-700 mb-2">Breed *</label>
                                <input type="text" id="race" name="race" value="{{ old('race') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('race') border-red-500 @enderror"
                                       placeholder="Enter the breed" required>
                                @error('race')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type_animal_id" class="block text-sm font-medium text-gray-700 mb-2">Animal Type *</label>
                                <select id="type_animal_id" name="type_animal_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('type_animal_id') border-red-500 @enderror" required>
                                    <option value="">Select animal type</option>
                                    @foreach($typeAnimaux as $type)
                                        <option value="{{ $type->id }}" {{ old('type_animal_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_animal_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="caractere" class="block text-sm font-medium text-gray-700 mb-2">Character/Personality</label>
                            <textarea id="caractere" name="caractere" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 @error('caractere') border-red-500 @enderror"
                                      placeholder="Describe your pet's personality, temperament, and behavior...">{{ old('caractere') }}</textarea>
                            @error('caractere')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-8 flex items-center justify-end space-x-4">
                            <a href="{{ route('animals.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2 rounded-lg hover:bg-primary-700 transition-colors">
                                Add Animal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
