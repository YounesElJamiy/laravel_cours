<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerEquipes extends Controller
{
    public function index()
    {
        $equipes = Equipes::all();
        return view('equipes.index', compact('equipes'));
    }

    public function create()
    {
        return view('equipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:equipes',
            'pays' => 'required',
            'entraineur' => 'required',
        ]);

        Equipes::create($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe ajoutée avec succès!');
    }

    public function show(Equipes $equipes)
    {
        return view('equipes.show', compact('equipes'));
    }

    public function edit(Equipes $equipes)
    {
        return view('equipes.edit', compact('equipes'));
    }

    public function update(Request $request, Equipes $equipes)
    {
        $request->validate([
            'nom' => 'required',
            'pays' => 'required',
            'entraineur' => 'required',
        ]);

        $equipes->update($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour!');
    }

    public function destroy(Equipes $equipes)
    {
        $equipes->delete();
        return redirect()->route('equipes.index')->with('success', 'Équipe supprimée!');
    }
}

