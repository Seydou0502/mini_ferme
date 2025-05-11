<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Affiche la liste des animaux
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    // Affiche le formulaire de création d'un animal
    public function create()
    {
        $this->authorize('admin-only');
        return view('animals.create');
    }

    // Enregistre un nouvel animal
    public function store(Request $request)
    {
        $this->authorize('admin-only');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'health_status' => 'nullable|string|max:255',
        ]);

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'Animal ajouté avec succès.');
    }

    // Affiche le formulaire d'édition d'un animal
    public function edit(Animal $animal)
    {
        $this->authorize('admin-only');
        return view('animals.edit', compact('animal'));
    }

    // Met à jour un animal existant
    public function update(Request $request, Animal $animal)
    {
        $this->authorize('admin-only');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'health_status' => 'nullable|string|max:255',
        ]);

        $animal->update($validated);

        return redirect()->route('animals.index')->with('success', 'Animal modifié avec succès.');
    }

    // Supprime un animal
    public function destroy(Animal $animal)
    {
        $this->authorize('admin-only');
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal supprimé avec succès.');
    }
}
