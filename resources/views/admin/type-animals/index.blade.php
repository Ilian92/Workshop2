<x-admin-layout title="Types d'animaux" subtitle="Gestion des types d'animaux">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">Liste des types d'animaux</h3>
                <a href="{{ route('admin.type-animals.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                    Nouveau type
                </a>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead style="background-color: #FFF8F0;">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre d'animaux</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($typeAnimals as $type)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $type->nom }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $type->animals_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $type->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                <a href="{{ route('admin.type-animals.show', $type) }}" class="text-blue-600 hover:text-blue-800">Voir</a>
                                <a href="{{ route('admin.type-animals.edit', $type) }}" class="text-green-600 hover:text-green-800">Modifier</a>
                                @if($type->animals_count == 0)
                                    <form action="{{ route('admin.type-animals.destroy', $type) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce type d\'animal ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Supprimer</button>
                                    </form>
                                @else
                                    <span class="text-gray-400" title="Impossible de supprimer : {{ $type->animals_count }} animaux associés">Supprimer</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($typeAnimals->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $typeAnimals->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>
