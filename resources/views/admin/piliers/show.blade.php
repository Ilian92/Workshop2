<x-admin-layout title="Détails du pilier" subtitle="Informations détaillées du pilier">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-900">{{ $pilier->nom }}</h3>
                <div class="space-x-4">
                    <a href="{{ route('admin.piliers.edit', $pilier) }}" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Modifier
                    </a>
                    <a href="{{ route('admin.piliers.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Nom</h4>
                    <p class="text-gray-900">{{ $pilier->nom }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Date de création</h4>
                    <p class="text-gray-900">{{ $pilier->created_at->format('d/m/Y H:i') }}</p>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Dernière modification</h4>
                    <p class="text-gray-900">{{ $pilier->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-700 mb-2">Description courte</h4>
                <p class="text-gray-900">{{ $pilier->descriptionCourte }}</p>
            </div>
        </div>
    </div>
</x-admin-layout>
