<x-layout title="Accueil">
<section class="bg-gradient-to-br from-green-300 via-green-400 to-teal-400 relative overflow-hidden min-h-[70vh]">
    <div class="container mx-auto px-6 py-20 flex items-center justify-between">
        <!-- Contenu texte -->
        <div class="w-1/2 z-10">
            <h1 class="text-5xl font-bold text-gray-800 mb-6 leading-tight">
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
                    <div class="text-3xl font-bold text-gray-800">+100</div>
                    <div class="text-sm text-gray-600">Produits disponibles</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-800">+2,000</div>
                    <div class="text-sm text-gray-600">Clients satisfaits</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-800">1,000</div>
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
<section class="bg-pink-50 py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">NOUVEAUTÉS</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Affichage des 4 produits les plus récents -->
            @foreach($nouveautes as $produit)
            <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : 'https://images.unsplash.com/photo-1601758228041-f3b2795255f1?w=300&h=300&fit=crop' }}" 
                         alt="{{ $produit->nom }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
                <h3 class="font-semibold text-gray-800 mb-2">{{ $produit->nom }}</h3>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($produit->prix / 100, 2) }}€</p>
            </div>
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
<section class="bg-white py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Meilleures ventes</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @php
                $meilleuresVentes = \App\Models\Produit::with(['typeAnimal', 'pilier'])->skip(4)->take(4)->get();
            @endphp
            
            @foreach($meilleuresVentes as $produit)
            <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                    <img src="{{ $produit->image ? asset('storage/' . $produit->image) : 'https://images.unsplash.com/photo-1434725039720-aaad6dd32dfe?w=300&h=300&fit=crop' }}" 
                         alt="{{ $produit->nom }}" 
                         class="w-full h-full object-cover rounded-lg">
                </div>
                <h3 class="font-semibold text-gray-800 mb-1">{{ $produit->nom }}</h3>
                <div class="flex text-yellow-400 mb-2">
                    <span>★★★★★</span>
                </div>
                <p class="text-xl font-bold text-gray-800">{{ number_format($produit->prix / 100, 2) }}€</p>
            </div>
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
<section class="bg-white py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Découvrez nos piliers</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @php
                $piliers = \App\Models\Pilier::with('produits')->get();
                $images = [
                    'éducation' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop',
                    'santé' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=500&h=300&fit=crop',
                    'activité' => 'https://images.unsplash.com/photo-1494790108755-2616c273e1df?w=500&h=300&fit=crop',
                    'alimentation' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&h=300&fit=crop',
                    'lifestyle' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop',
                    'compréhension émotionnelle de l\'animal' => 'https://images.unsplash.com/photo-1507591064344-4c6ce005b128?w=500&h=300&fit=crop'
                ];
            @endphp
            
            @foreach($piliers->take(4) as $pilier)
            <div class="relative group cursor-pointer">
                <img src="{{ $images[$pilier->nom] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop' }}" 
                     alt="{{ $pilier->nom }}" 
                     class="w-full h-64 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg group-hover:bg-opacity-40 transition-colors duration-300"></div>
                <div class="absolute top-6 left-6">
                    <h3 class="text-2xl font-bold text-white capitalize">{{ $pilier->nom }}</h3>
                    <p class="text-white text-sm mt-2">{{ $pilier->descriptionCourte }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Section OUR HAPPY CUSTOMERS -->
<section class="bg-white py-16">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">NOS CLIENTS SATISFAITS</h2>
            <div class="flex space-x-2">
                <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">←</button>
                <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 transition-colors">→</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Témoignage 1 -->
            <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex text-yellow-400 mb-4">
                    <span>★★★★★</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Sarah M. ✓</h4>
                <p class="text-gray-600 text-sm">
                    "Je suis émerveillée par la qualité des produits pour mon chien. Chaque article que j'ai acheté a dépassé mes attentes. Mon Golden Retriever n'a jamais été aussi heureux !"
                </p>
            </div>
            
            <!-- Témoignage 2 -->
            <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex text-yellow-400 mb-4">
                    <span>★★★★★</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Alex K. ✓</h4>
                <p class="text-gray-600 text-sm">
                    "Trouver des produits adaptés aux besoins spécifiques de mon chat était un défi jusqu'à ce que je découvre APWAP. La gamme de produits qu'ils proposent est vraiment remarquable."
                </p>
            </div>
            
            <!-- Témoignage 3 -->
            <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                <div class="flex text-yellow-400 mb-4">
                    <span>★★★★★</span>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">James L. ✓</h4>
                <p class="text-gray-600 text-sm">
                    "En tant que propriétaire de plusieurs animaux, je suis ravi d'avoir trouvé APWAP. Les produits sont non seulement de qualité mais aussi parfaitement adaptés aux dernières tendances du bien-être animal."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section Newsletter -->
<section class="bg-gray-900 py-16">
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
</section>
</x-layout>
