<x-admin-layout title="Détails de l'utilisateur" subtitle="Informations détaillées de l'utilisateur">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.users.edit', $user) }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Modifier
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom d'utilisateur</h4>
                    <p class="text-gray-900">{{ $user->name }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Email</h4>
                    <p class="text-gray-900">{{ $user->email }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Prénom</h4>
                    <p class="text-gray-900">{{ $user->first_name ?: 'Non renseigné' }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom</h4>
                    <p class="text-gray-900">{{ $user->last_name ?: 'Non renseigné' }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Téléphone</h4>
                    <p class="text-gray-900">{{ $user->phone ?: 'Non renseigné' }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Adresse</h4>
                    <p class="text-gray-900">{{ $user->address ?: 'Non renseigné' }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Rôle</h4>
                    <span class="px-2 py-1 text-xs rounded-full {{ $user->isAdmin() ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $user->role->nom }}
                    </span>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Date d'inscription</h4>
                    <p class="text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Dernière modification</h4>
                    <p class="text-gray-900">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @if($user->animals->count() > 0)
        <div class="bg-white rounded-lg shadow-sm mt-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Animaux de cet utilisateur</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead style="background-color: #FFF8F0;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Âge</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poids</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($user->animals as $animal)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $animal->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $animal->typeAnimal->nom }}</td>
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
