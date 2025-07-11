<x-admin-layout title="Détails de l'animal" subtitle="Informations détaillées de l'animal">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">{{ $animal->nom }}</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.animals.edit', $animal) }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Modifier
                    </a>
                    <a href="{{ route('admin.animals.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom</h4>
                    <p class="text-gray-900">{{ $animal->nom }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Type d'animal</h4>
                    <p class="text-gray-900">{{ $animal->typeAnimal->nom }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Propriétaire</h4>
                    @if($animal->user)
                        <a href="{{ route('admin.users.show', $animal->user) }}" class="text-blue-600 hover:text-blue-800">
                            {{ $animal->user->name }} ({{ $animal->user->email }})
                        </a>
                    @else
                        <p class="text-gray-500">Non assigné</p>
                    @endif
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Âge</h4>
                    <p class="text-gray-900">{{ $animal->age }} ans</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Poids</h4>
                    <p class="text-gray-900">{{ $animal->poids }} kg</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Date de création</h4>
                    <p class="text-gray-900">{{ $animal->created_at->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Dernière modification</h4>
                    <p class="text-gray-900">{{ $animal->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            @if($animal->description)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Description</h4>
                    <p class="text-gray-900">{{ $animal->description }}</p>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
