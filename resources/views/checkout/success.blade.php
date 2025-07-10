<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commande confirmée') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="text-green-500 mb-4">
                        <svg class="mx-auto h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">Merci pour votre commande !</h1>
                    <p class="text-lg text-gray-600 mb-6">Votre commande a été traitée avec succès.</p>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Détails de la commande</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                            <div>
                                <p class="text-sm text-gray-500">Numéro de commande</p>
                                <p class="font-semibold text-gray-900">{{ $order->order_number }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-500">Date de commande</p>
                                <p class="font-semibold text-gray-900">{{ $order->date_commande }} </p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-500">Montant total</p>
                                <p class="font-semibold text-green-600 text-lg">{{ number_format($order->total, 2) }} €</p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-500">Statut</p>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Payée
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="text-left">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Adresse de livraison</h3>
                            <p class="text-gray-600">{{ $order->adresse_livraison }}</p>
                        </div>
                        
                        <div class="text-left">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Adresse de facturation</h3>
                            <p class="text-gray-600">{{ $order->adresse_facturation }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 space-y-4">
                        <a href="{{ route('products.index') }}" 
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                            Continuer les achats
                        </a>
                        
                        <div>
                            <a href="{{ route('dashboard') }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium">
                                Retour au tableau de bord
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 