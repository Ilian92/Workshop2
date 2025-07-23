<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Animal;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $stats = [
            'my_animals' => Animal::where('user_id', $user->id)->count(),
            'my_orders' => Commande::where('user_id', $user->id)->count(),
            'total_spent' => Commande::where('user_id', $user->id)->sum('total') / 100,
            'recent_orders_count' => Commande::where('user_id', $user->id)->where('created_at', '>=', now()->subDays(30))->count(),
        ];

        $myAnimals = Animal::with('typeAnimal')
            ->where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();

        $myOrders = Commande::with('produits')
            ->where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();

        $userAnimalTypes = Animal::where('user_id', $user->id)->pluck('type_animal_id')->unique();
        $recommendedProducts = Produit::with('typeAnimal')
            ->whereIn('type_animal_id', $userAnimalTypes)
            ->latest()
            ->limit(6)
            ->get();

        if ($recommendedProducts->isEmpty()) {
            $recommendedProducts = Produit::with('typeAnimal')
                ->latest()
                ->limit(6)
                ->get();
        }

        return view('dashboard', compact('stats', 'myAnimals', 'myOrders', 'recommendedProducts'));
    }
}
