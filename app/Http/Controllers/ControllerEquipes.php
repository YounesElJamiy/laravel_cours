<?php

namespace App\Http\Controllers;

use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerEquipes extends Controller
{
    public function index()
    {
        $equipe = Equipes::all();
        return view('equipes.index', compact('equipe'));
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

    public function show(Equipes $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }

    public function edit($id)
    {
        $equipe = Equipes::find($id);
        if(!$equipe) {
            return redirect()->route('equipes.index')->with('error', 'Équipe non trouvée');
        }
        return view('equipes.edit', compact('equipe'));
    }

    public function update(Request $request, Equipes $equipe)
    {
        $request->validate([
            'nom' => 'required',
            'pays' => 'required',
            'entraineur' => 'required',
        ]);

        $equipe->update($request->all());
        return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour!');
    }

    public function destroy(Equipes $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index')->with('success', 'Équipe supprimée!');
    }
}

