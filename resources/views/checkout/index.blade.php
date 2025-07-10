<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finaliser la commande') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Résumé de la commande -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Résumé de votre commande</h3>
                        
                        <div class="space-y-4">
                            @foreach($products as $item)
                                <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                                    <div class="flex items-center space-x-3">
                                        @if($item['product']->image)
                                            <img src="{{ $item['product']->image }}" 
                                                 alt="{{ $item['product']->nom }}" 
                                                 class="w-12 h-12 object-cover rounded">
                                        @else
                                            <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                                <span class="text-gray-500 text-xs">Aucune image</span>
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <h4 class="font-medium text-gray-900">{{ $item['product']->nom }}</h4>
                                            <p class="text-sm text-gray-500">Quantité: {{ $item['quantity'] }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="font-semibold text-green-600">{{ number_format($item['subtotal'], 2) }} €</p>
                                        <p class="text-sm text-gray-500">{{ number_format($item['product']->prix, 2) }} € l'unité</p>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-gray-900">Total</span>
                                    <span class="text-2xl font-bold text-green-600">{{ number_format($total, 2) }} €</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de paiement -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations de livraison et facturation</h3>
                        
                        <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
                            @csrf
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">
                                        Adresse de livraison *
                                    </label>
                                    <textarea id="shipping_address" 
                                              name="shipping_address" 
                                              rows="3" 
                                              required
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                              placeholder="Entrez votre adresse de livraison complète"></textarea>
                                    @error('shipping_address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="billing_address" class="block text-sm font-medium text-gray-700 mb-2">
                                        Adresse de facturation *
                                    </label>
                                    <textarea id="billing_address" 
                                              name="billing_address" 
                                              rows="3" 
                                              required
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                              placeholder="Entrez votre adresse de facturation complète"></textarea>
                                    @error('billing_address')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="border-t border-gray-200 pt-4">
                                    <h4 class="text-md font-semibold text-gray-900 mb-4">Informations de paiement</h4>
                                    
                                    <div id="card-element" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                        <!-- Stripe Elements sera injecté ici -->
                                    </div>
                                    
                                    <div id="card-errors" class="text-red-500 text-sm mt-2" role="alert"></div>
                                </div>

                                <div class="flex space-x-4 pt-4">
                                    <a href="{{ route('cart.index') }}" 
                                       class="flex-1 bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition duration-200 text-center">
                                        Retour au panier
                                    </a>
                                    
                                    <button type="submit" 
                                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200">
                                        Payer {{ number_format($total, 2) }} €
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Configuration Stripe
        const stripe = Stripe('{{ config("services.stripe.key") }}');
        const elements = stripe.elements();
        
        // Créer l'élément de carte
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#424770',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
                invalid: {
                    color: '#9e2146',
                },
            },
        });
        
        // Monter l'élément de carte
        cardElement.mount('#card-element');
        
        // Gérer les erreurs de validation
        cardElement.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Gérer la soumission du formulaire
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Traitement en cours...';
            
            stripe.confirmCardPayment('{{ $paymentIntent->client_secret }}', {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: '{{ auth()->user()->name }}',
                    },
                }
            }).then(function(result) {
                if (result.error) {
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    submitButton.disabled = false;
                    submitButton.textContent = 'Payer {{ number_format($total, 2) }} €';
                } else {
                    // Le paiement a réussi, soumettre le formulaire
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout> 