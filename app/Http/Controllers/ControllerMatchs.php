<?php

namespace App\Http\Controllers;

use App\Models\Matchs;
use App\Models\Competitions;
use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerMatchs extends Controller
{
    public function index()
    {
        $match = Matchs::with(['competition', 'equipeDomicile', 'equipeExterieur'])->get();
        return view('matchs.index', compact('match'));
    }

    public function create()
    {
        $competition = Competitions::all();
        $equipe = Equipes::all();
        return view('matchs.create', compact('competition', 'equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCompetition' => 'required|exists:competitions,id',
            'idEquipeDomicile' => 'required|exists:equipes,id|different:idEquipeExterieur',
            'idEquipeExterieur' => 'required|exists:equipes,id',
            'dateMatch' => 'required|date',
            'scoreDomicile' => 'nullable|integer',
            'scoreExterieur' => 'nullable|integer',
        ]);

        Matchs::create($request->all());
        return redirect()->route('matchs.index')->with('success', 'Match ajouté avec succès!');
    }

    public function show(Matchs $match)
    {
        return view('matchs.show', compact('match'));
    }

    public function edit(Matchs $match)
    {
        $competition = Competitions::all();
        $equipe = Equipes::all();
        return view('matchs.edit', compact('match', 'competition', 'equipe'));
    }

    public function update(Request $request, Matchs $match)
    {
        $request->validate([
            'idCompetition' => 'required|exists:competitions,id',
            'idEquipeDomicile' => 'required|exists:equipes,id|different:idEquipeExterieur',
            'idEquipeExterieur' => 'required|exists:equipes,id',
            'dateMatch' => 'required|date',
            'scoreDomicile' => 'nullable|integer',
            'scoreExterieur' => 'nullable|integer',
        ]);

        $match->update($request->all());
        return redirect()->route('matchs.index')->with('success', 'Match mis à jour!');
    }

    public function destroy(Matchs $match)
    {
        $match->delete();
        return redirect()->route('matchs.index')->with('success', 'Match supprimé!');
    }

    // 🔍 Filtrer les matchs par compétition
    public function filterByCompetition($idCompetition)
    {
        $match = Matchs::where('idCompetition', $idCompetition)->get();
        return view('matchs.index', compact('match'));
    }

    // 🔍 Filtrer les matchs après une certaine date
    public function filterByDate($date)
    {
        $match = Matchs::where('dateMatch', '>', $date)->get();
        return view('matchs.index', compact('match'));
    }
}
