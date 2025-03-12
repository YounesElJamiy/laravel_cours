<?php

namespace App\Http\Controllers;

use App\Models\Joueurs;
use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerJoueurs extends Controller
{
    public function index()
    {
        $joueur = Joueurs::with('equipes')->get();
        return view('joueurs.index', compact('joueur'));
    }

    public function create()
    {
        $equipe = Equipes::all();
        return view('joueurs.create', compact('equipe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'nationalite' => 'required',
            'idEquipe' => 'required|exists:equipes,id',
        ]);

        Joueurs::create($request->all());
        return redirect()->route('joueurs.index')->with('success', 'Joueur ajouté!');
    }

    public function show(Joueurs $joueur)
    {
        return view('joueurs.show', compact('joueur'));
    }

    public function edit(Joueurs $joueur)
    {
        $equipes = Equipes::all();
        return view('joueurs.edit', compact('joueur', 'equipes'));
    }

    public function update(Request $request, Joueurs $joueur)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'nationalite' => 'required',
            'idEquipe' => 'required|exists:equipes,id',
        ]);

        $joueur->update($request->all());
        return redirect()->route('joueurs.index')->with('success', 'Joueur mis à jour!');
    }

    public function destroy(Joueurs $joueur)
    {
        $joueur->delete();
        return redirect()->route('joueurs.index')->with('success', 'Joueur supprimé!');
    }
}
