<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\TypeAnimal;
use App\Models\User;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with(['user', 'typeAnimal'])->paginate(20);
        return view('admin.animals.index', compact('animals'));
    }

    public function create()
    {
        $typeAnimals = TypeAnimal::all();
        $users = User::all();
        return view('admin.animals.create', compact('typeAnimals', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type_animal_id' => 'required|exists:type_animals,id',
            'user_id' => 'nullable|exists:users,id',
            'age' => 'required|integer|min:0|max:50',
            'poids' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Animal::create($request->all());

        return redirect()->route('admin.animals.index')->with('success', 'Animal créé avec succès.');
    }

    public function show(Animal $animal)
    {
        $animal->load(['user', 'typeAnimal']);
        return view('admin.animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        $typeAnimals = TypeAnimal::all();
        $users = User::all();
        return view('admin.animals.edit', compact('animal', 'typeAnimals', 'users'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type_animal_id' => 'required|exists:type_animals,id',
            'user_id' => 'nullable|exists:users,id',
            'age' => 'required|integer|min:0|max:50',
            'poids' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $animal->update($request->all());

        return redirect()->route('admin.animals.index')->with('success', 'Animal mis à jour avec succès.');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('admin.animals.index')->with('success', 'Animal supprimé avec succès.');
    }
}
