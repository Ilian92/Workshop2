<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pilier;
use Illuminate\Http\Request;

class PilierController extends Controller
{
    public function index()
    {
        $piliers = Pilier::paginate(20);
        return view('admin.piliers.index', compact('piliers'));
    }

    public function create()
    {
        return view('admin.piliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descriptionCourte' => 'required|string|max:500',
        ]);

        Pilier::create($request->all());

        return redirect()->route('admin.piliers.index')->with('success', 'Pilier créé avec succès.');
    }

    public function show(Pilier $pilier)
    {
        return view('admin.piliers.show', compact('pilier'));
    }

    public function edit(Pilier $pilier)
    {
        return view('admin.piliers.edit', compact('pilier'));
    }

    public function update(Request $request, Pilier $pilier)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descriptionCourte' => 'required|string|max:500',
        ]);

        $pilier->update($request->all());

        return redirect()->route('admin.piliers.index')->with('success', 'Pilier mis à jour avec succès.');
    }

    public function destroy(Pilier $pilier)
    {
        $pilier->delete();
        return redirect()->route('admin.piliers.index')->with('success', 'Pilier supprimé avec succès.');
    }
}
