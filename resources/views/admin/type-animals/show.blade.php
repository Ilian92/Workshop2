<x-admin-layout title="Détails du type d'animal" subtitle="Informations détaillées du type d'animal">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">{{ $typeAnimal->nom }}</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.type-animals.edit', $typeAnimal) }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Modifier
                    </a>
                    <a href="{{ route('admin.type-animals.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom</h4>
                    <p class="text-gray-900">{{ $typeAnimal->nom }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nombre d'animaux</h4>
                    <p class="text-gray-900">{{ $typeAnimal->animals->count() }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Date de création</h4>
                    <p class="text-gray-900">{{ $typeAnimal->created_at->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Dernière modification</h4>
                    <p class="text-gray-900">{{ $typeAnimal->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            @if($typeAnimal->description)
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Description</h4>
                    <p class="text-gray-900">{{ $typeAnimal->description }}</p>
                </div>
            @endif
        </div>
    </div>
    
    @if($typeAnimal->animals->count() > 0)
        <div class="bg-white rounded-lg shadow-sm mt-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Animaux de ce type</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead style="background-color: #FFF8F0;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propriétaire</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Âge</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poids</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($typeAnimal->animals as $animal)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $animal->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if($animal->user)
                                        <a href="{{ route('admin.users.show', $animal->user) }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $animal->user->name }}
                                        </a>
                                    @else
                                        <span class="text-gray-500">Non assigné</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $animal->age }} ans</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $animal->poids }} kg</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                    <a href="{{ route('admin.animals.show', $animal) }}" class="text-blue-600 hover:text-blue-800">Voir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-admin-layout>
