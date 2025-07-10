<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Produit::paginate(10);
        return view('products.index', compact('products'));
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
