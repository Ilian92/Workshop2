<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Animal;
use App\Models\Produit;
use App\Models\TypeAnimal;
use App\Models\Pilier;
use App\Models\Commande;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'animals' => Animal::count(),
            'produits' => Produit::count(),
            'types_animaux' => TypeAnimal::count(),
            'piliers' => Pilier::count(),
            'commandes' => Commande::count(),
        ];

        $recentUsers = User::latest()->limit(5)->get();
        $recentAnimals = Animal::with('user', 'typeAnimal')->latest()->limit(5)->get();
        $recentProduits = Produit::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'recentAnimals', 'recentProduits'));
    }
}
