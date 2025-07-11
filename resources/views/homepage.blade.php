<x-layout title="Accueil">
<section class="bg-gradient-to-br from-green-300 via-green-400 to-teal-400 relative overflow-hidden min-h-[70vh]">
    <div class="container mx-auto px-6 py-20 flex items-center justify-between">
        <!-- Contenu texte -->
        <div class="w-1/2 z-10">
            <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight font-['Archivo_Black']">
                Trouvez ce qu'il y<br>
                a de mieux pour<br>
                votre animal.
            </h1>
            <p class="text-gray-700 mb-8 text-lg">
                Explorez nos produits soigneusement sélectionnés pour animaux et faites<br>
                le bon choix pour votre compagnon de quatre pattes.
            </p>
            <a href="{{ route('products.index') }}" class="inline-block bg-gray-800 text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-700 transition-colors">
                Voir la boutique
            </a>
            
            <!-- Statistiques -->
            <div class="flex space-x-12 mt-12">
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['produits'] }}</div>
                    <div class="text-sm text-gray-600">Produits disponibles</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['clients'] }}</div>
                    <div class="text-sm text-gray-600">Clients satisfaits</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-800">{{ $stats['animaux'] }}</div>
                    <div class="text-sm text-gray-600">Animaux heureux</div>
                </div>
            </div>
        </div>
        
        <!-- Image du chien -->
        <div class="w-1/2 relative">
            <!-- Étoile en haut à droite -->
            <div class="absolute top-0 right-0 transform rotate-12">
                <svg width="60" height="60" viewBox="0 0 24 24" class="text-gray-800 fill-current">
                    <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
                </svg>
            </div>
            
            <!-- Image du chien Chihuahua -->
            <div class="ml-auto max-w-md">
                <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=500&h=600&fit=crop&crop=face" 
                     alt="Chien Chihuahua" 
                     class="w-full rounded-lg shadow-lg">
            </div>
            
            <!-- Petite étoile en bas à gauche -->
            <div class="absolute bottom-10 left-10 transform -rotate-12">
                <svg width="40" height="40" viewBox="0 0 24 24" class="text-gray-700 fill-current">
                    <polygon points="12,2 15,9 22,9 17,14 19,21 12,17 5,21 7,14 2,9 9,9"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Section Nouveautés -->
<section class="py-16" style="background-color: #FFF8F0;">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-['Archivo_Black']">NOUVEAUTÉS</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($nouveautes as $produit)
            <a href="{{ route('products.show', $produit->id) }}" class="block rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                    <img src="{{ $produit->image_url }}" 
                         alt="{{ $produit->nom }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">{{ $produit->nom }}</h3>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($produit->prix / 100, 2) }}€</p>
            </a>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="inline-block bg-green-500 text-white px-8 py-3 rounded-lg font-medium hover:bg-green-600 transition-colors">
                Voir tous les produits
            </a>
        </div>
    </div>
</section>

<!-- Section Meilleures ventes -->
<section class="py-16" style="background-color: #FFF8F0;">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-['Archivo_Black']">Meilleures ventes</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($meilleuresVentes as $produit)
            <a href="{{ route('products.show', $produit->id) }}" class="block rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                    <img src="{{ $produit->image_url }}" 
                         alt="{{ $produit->nom }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
                <h3 class="font-semibold text-gray-800 mb-1">{{ $produit->nom }}</h3>
                <p class="text-xl font-bold text-gray-800">{{ number_format($produit->prix / 100, 2) }}€</p>
                @if($produit->total_vendu > 0)
                    <p class="text-sm text-gray-500 mt-1">{{ $produit->total_vendu }} vendus</p>
                @endif
            </a>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('products.index') }}" class="inline-block border border-gray-300 text-gray-700 px-8 py-3 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                Voir tout
            </a>
        </div>
    </div>
</section>

<!-- Section Découvrez nos piliers -->
<section class="py-16" style="background-color: #FFF8F0;">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 font-['Archivo_Black']">Découvrez nos piliers</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($piliers as $pilier)
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h3 class="text-xl font-bold text-gray-800 mb-4 capitalize">{{ $pilier->nom }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $pilier->descriptionCourte }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section Newsletter -->
{{-- <section class="bg-gray-900 py-16">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row justify-between items-center">
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-3xl font-bold text-white mb-4">RESTEZ INFORMÉ DE NOS<br>DERNIÈRES OFFRES</h2>
            </div>
            <div class="w-full lg:w-1/2 lg:pl-12">
                <div class="space-y-4">
                    <input type="email" 
                           placeholder="Entrez votre adresse email" 
                           class="w-full px-4 py-3 rounded-lg bg-white text-gray-800 placeholder-gray-500">
                    <button class="w-full bg-white text-gray-800 px-4 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                        S'abonner à la newsletter
                    </button>
                </div>
            </div>
        </div>
    </div>
</section> --}}
</x-layout>
