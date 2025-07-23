<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\TypeAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the user's animals.
     */
    public function index()
    {
        $animals = Animal::with('typeAnimal')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(12);

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new animal.
     */
    public function create()
    {
        $typeAnimaux = TypeAnimal::all();
        return view('animals.create', compact('typeAnimaux'));
    }

    /**
     * Store a newly created animal in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'dateNaissance' => 'required|date|before_or_equal:today',
            'race' => 'required|string|max:255',
            'caractere' => 'nullable|string|max:255',
            'type_animal_id' => 'required|exists:typeanimal,id',
        ]);

        $validated['user_id'] = Auth::id();
        
        // Calculer l'âge à partir de la date de naissance
        $dateNaissance = \Carbon\Carbon::parse($validated['dateNaissance']);
        $validated['age'] = $dateNaissance->diffInYears(now());
        
        // Utiliser une valeur par défaut pour caractère si non fournie
        if (empty($validated['caractere'])) {
            $validated['caractere'] = 'Friendly';
        }

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'Animal added successfully!');
    }

    /**
     * Show the form for editing the specified animal.
     */
    public function edit(Animal $animal)
    {
        // Vérifier que l'animal appartient à l'utilisateur connecté
        if ($animal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this animal.');
        }

        $typeAnimaux = TypeAnimal::all();
        return view('animals.edit', compact('animal', 'typeAnimaux'));
    }

    /**
     * Update the specified animal in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        // Vérifier que l'animal appartient à l'utilisateur connecté
        if ($animal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this animal.');
        }

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'dateNaissance' => 'required|date|before_or_equal:today',
            'race' => 'required|string|max:255',
            'caractere' => 'nullable|string|max:255',
            'type_animal_id' => 'required|exists:typeanimal,id',
        ]);

        // Calculer l'âge à partir de la date de naissance
        $dateNaissance = \Carbon\Carbon::parse($validated['dateNaissance']);
        $validated['age'] = $dateNaissance->diffInYears(now());
        
        // Utiliser une valeur par défaut pour caractère si non fournie
        if (empty($validated['caractere'])) {
            $validated['caractere'] = $animal->caractere ?? 'Friendly';
        }

        $animal->update($validated);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully!');
    }

    /**
     * Remove the specified animal from storage.
     */
    public function destroy(Animal $animal)
    {
        // Vérifier que l'animal appartient à l'utilisateur connecté
        if ($animal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this animal.');
        }

        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }
}
