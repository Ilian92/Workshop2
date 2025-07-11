<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::paginate(20);
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['image', 'prix']);
        $data['prix'] = $request->prix * 100; // Convertir en centimes

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        Produit::create($data);

        return redirect()->route('admin.produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['image', 'prix']);
        $data['prix'] = $request->prix * 100; // Convertir en centimes

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($produit->image) {
                Storage::delete('public/products/' . $produit->image);
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        $produit->update($data);

        return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        // Supprimer l'image
        if ($produit->image) {
            Storage::delete('public/products/' . $produit->image);
        }

        // Supprimer les images supplémentaires
        if ($produit->images) {
            foreach ($produit->images as $image) {
                Storage::delete('public/products/' . $image);
            }
        }

        $produit->delete();
        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
