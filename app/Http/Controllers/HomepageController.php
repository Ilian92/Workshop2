<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class HomepageController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        // Récupérer les 4 produits les plus récents
        $nouveautes = Produit::with(['typeAnimal', 'pilier'])
            ->latest('created_at')
            ->take(4)
            ->get();

        return view('homepage', compact('nouveautes'));
    }
}
