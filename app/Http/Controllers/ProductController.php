<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Pilier;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Produit::with(['pilier', 'typeAnimal']);
        
        // Filtre par pilier si spécifié
        if ($request->has('pilier') && $request->pilier != '') {
            $query->where('pilier_id', $request->pilier);
        }
        
        $products = $query->paginate(10);
        $piliers = Pilier::all();
        
        return view('products.index', compact('products', 'piliers'));
    }


    public function create()
    {
    
    }


    public function store(Request $request)
    {
        
    }


    public function show(Produit $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        
    }


    public function update(Request $request, string $id)
    {
        
    }


    public function destroy(string $id)
    {
        
    }
}
