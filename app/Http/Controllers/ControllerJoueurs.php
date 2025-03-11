<?php

namespace App\Http\Controllers;

use App\Models\Joueurs;
use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerJoueurs extends Controller
{
    public function index()
    {
        $joueurs = Joueurs::with('equipes')->get();
        return view('joueurs.index', compact('joueurs'));
    }

    public function create()
    {
        $equipes = Equipes::all();
        return view('joueurs.create', compact('equipes'));
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

    public function show(Joueurs $joueurs)
    {
        return view('joueurs.show', compact('joueurs'));
    }

    public function edit(Joueurs $joueurs)
    {
        $equipes = Equipes::all();
        return view('joueurs.edit', compact('joueurs', 'equipes'));
    }

    public function update(Request $request, Joueurs $joueurs)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'poste' => 'required',
            'nationalite' => 'required',
            'idEquipe' => 'required|exists:equipes,id',
        ]);

        $joueurs->update($request->all());
        return redirect()->route('joueurs.index')->with('success', 'Joueur mis à jour!');
    }

    public function destroy(Joueurs $joueurs)
    {
        $joueurs->delete();
        return redirect()->route('joueurs.index')->with('success', 'Joueur supprimé!');
    }
}
