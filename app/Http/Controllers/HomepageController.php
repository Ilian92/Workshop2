<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Pilier;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        $nouveautes = Produit::with(['typeAnimal', 'pilier'])
            ->latest('created_at')
            ->take(4)
            ->get();

        $meilleuresVentes = Produit::with(['typeAnimal', 'pilier'])
            ->select('produit.*', DB::raw('COALESCE(SUM(produit_commande.quantite), 0) as total_vendu'))
            ->leftJoin('produit_commande', 'produit.id', '=', 'produit_commande.produit_id')
            ->groupBy('produit.id')
            ->orderBy('total_vendu', 'desc')
            ->take(4)
            ->get();

        $piliers = Pilier::all();

        return view('homepage', compact('nouveautes', 'meilleuresVentes', 'piliers'));
    }
}
