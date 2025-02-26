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
        $matchs = Matchs::with(['competition', 'equipeDomicile', 'equipeExterieur'])->get();
        return view('matchs.index', compact('matchs'));
    }

    public function create()
    {
        $competitions = Competitions::all();
        $equipes = Equipes::all();
        return view('matchs.create', compact('competitions', 'equipes'));
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

    public function show(Matchs $matchs)
    {
        return view('matchs.show', compact('matchs'));
    }

    public function edit(Matchs $matchs)
    {
        $competitions = Competitions::all();
        $equipes = Equipes::all();
        return view('matchs.edit', compact('matchs', 'competitions', 'equipes'));
    }

    public function update(Request $request, Matchs $matchs)
    {
        $request->validate([
            'idCompetition' => 'required|exists:competitions,id',
            'idEquipeDomicile' => 'required|exists:equipes,id|different:idEquipeExterieur',
            'idEquipeExterieur' => 'required|exists:equipes,id',
            'dateMatch' => 'required|date',
            'scoreDomicile' => 'nullable|integer',
            'scoreExterieur' => 'nullable|integer',
        ]);

        $matchs->update($request->all());
        return redirect()->route('matchs.index')->with('success', 'Match mis à jour!');
    }

    public function destroy(Matchs $matchs)
    {
        $matchs->delete();
        return redirect()->route('matchs.index')->with('success', 'Match supprimé!');
    }

    // 🔍 Filtrer les matchs par compétition
    public function filterByCompetition($idCompetition)
    {
        $matchs = Matchs::where('idCompetition', $idCompetition)->get();
        return view('matchs.index', compact('matchs'));
    }

    // 🔍 Filtrer les matchs après une certaine date
    public function filterByDate($date)
    {
        $matchs = Matchs::where('dateMatch', '>', $date)->get();
        return view('matchs.index', compact('matchs'));
    }
}
