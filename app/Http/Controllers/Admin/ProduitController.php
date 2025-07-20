<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\TypeAnimal;
use App\Models\Pilier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with(['typeAnimal', 'pilier'])->paginate(20);
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        $typeAnimals = TypeAnimal::all();
        $piliers = Pilier::all();
        return view('admin.produits.create', compact('typeAnimals', 'piliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'descriptionCourte' => 'required|string|max:255',
            'descriptionLongue' => 'required|string',
            'quantite' => 'required|integer|min:0',
            'type_animal_id' => 'required|exists:typeanimal,id',
            'pilier_id' => 'required|exists:pilier,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['image', 'images', 'prix']);
        $data['prix'] = $request->prix * 100; // centimes

        // Image principale
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        // Images multiples
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . $img->getClientOriginalName();
                $img->storeAs('public/products', $imgName);
                $images[] = $imgName;
            }
        }
        $data['images'] = $images;

        Produit::create($data);

        return redirect()->route('admin.produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function show(Produit $produit)
    {
        $produit->load(['typeAnimal', 'pilier']);
        return view('admin.produits.show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        $typeAnimals = TypeAnimal::all();
        $piliers = Pilier::all();
        return view('admin.produits.edit', compact('produit', 'typeAnimals', 'piliers'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'descriptionCourte' => 'required|string|max:255',
            'descriptionLongue' => 'required|string',
            'quantite' => 'required|integer|min:0',
            'type_animal_id' => 'required|exists:typeanimal,id',
            'pilier_id' => 'required|exists:pilier,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['image', 'images', 'prix']);
        $data['prix'] = $request->prix * 100;

        // Image principale
        if ($request->hasFile('image')) {
            if ($produit->image) {
                Storage::delete('public/products/' . $produit->image);
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/products', $imageName);
            $data['image'] = $imageName;
        }

        // Images multiples
        $images = $produit->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . $img->getClientOriginalName();
                $img->storeAs('public/products', $imgName);
                $images[] = $imgName;
            }
        }
        $data['images'] = $images;

        $produit->update($data);

        return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Produit $produit)
    {
        if ($produit->image) {
            Storage::delete('public/products/' . $produit->image);
        }
        if ($produit->images) {
            foreach ($produit->images as $img) {
                Storage::delete('public/products/' . $img);
            }
        }
        $produit->delete();
        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
