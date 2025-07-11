<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;

class TypeAnimalController extends Controller
{
    public function index()
    {
        $typeAnimals = TypeAnimal::withCount('animals')->paginate(20);
        return view('admin.type-animals.index', compact('typeAnimals'));
    }

    public function create()
    {
        return view('admin.type-animals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_animals',
            'description' => 'nullable|string',
        ]);

        TypeAnimal::create($request->all());

        return redirect()->route('admin.type-animals.index')->with('success', 'Type d\'animal créé avec succès.');
    }

    public function show(TypeAnimal $typeAnimal)
    {
        $typeAnimal->load('animals.user');
        return view('admin.type-animals.show', compact('typeAnimal'));
    }

    public function edit(TypeAnimal $typeAnimal)
    {
        return view('admin.type-animals.edit', compact('typeAnimal'));
    }

    public function update(Request $request, TypeAnimal $typeAnimal)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_animals,nom,' . $typeAnimal->id,
            'description' => 'nullable|string',
        ]);

        $typeAnimal->update($request->all());

        return redirect()->route('admin.type-animals.index')->with('success', 'Type d\'animal mis à jour avec succès.');
    }

    public function destroy(TypeAnimal $typeAnimal)
    {
        if ($typeAnimal->animals()->count() > 0) {
            return redirect()->route('admin.type-animals.index')->with('error', 'Impossible de supprimer ce type d\'animal car il y a des animaux associés.');
        }

        $typeAnimal->delete();
        return redirect()->route('admin.type-animals.index')->with('success', 'Type d\'animal supprimé avec succès.');
    }
}
