<?php

namespace App\Http\Controllers;

use App\Models\Transfers;
use App\Models\Joueurs;
use App\Models\Equipes;
use Illuminate\Http\Request;

class ControllerTransfers extends Controller
{
    public function index()
    {
        $transfers = Transfers::with(['joueur', 'equipeDepart', 'equipeArrivee'])->get();
        return view('transfers.index', compact('transfers'));
    }

    public function create()
    {
        $joueurs = Joueurs::all();
        $equipes = Equipes::all();
        return view('transfers.create', compact('joueurs', 'equipes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idJoueur' => 'required|exists:joueurs,id',
            'idEquipeDepart' => 'required|exists:equipes,id|different:idEquipeArrivee',
            'idEquipeArrivee' => 'required|exists:equipes,id',
            'montant' => 'required|numeric|min:0',
            'dateTransfer' => 'required|date',
        ]);

        Transfers::create($request->all());
        return redirect()->route('transfers.index')->with('success', 'Transfer ajouté!');
    }

    public function show(Transfers $transfers)
    {
        return view('transfers.show', compact('transfer'));
    }

    public function edit(Transfers $transfers)
    {
        $joueurs = Joueurs::all();
        $equipes = Equipes::all();
        return view('transfers.edit', compact('transfer', 'joueurs', 'equipes'));
    }

    public function update(Request $request, Transfers $transfers)
    {
        $request->validate([
            'idJoueur' => 'required|exists:joueurs,id',
            'idEquipeDepart' => 'required|exists:equipes,id|different:idEquipeArrivee',
            'idEquipeArrivee' => 'required|exists:equipes,id',
            'montant' => 'required|numeric|min:0',
            'dateTransfer' => 'required|date',
        ]);

        $transfers->update($request->all());
        return redirect()->route('transfers.index')->with('success', 'Transfer mis à jour!');
    }

    public function destroy(Transfers $transfers)
    {
        $transfers->delete();
        return redirect()->route('transfers.index')->with('success', 'Transfer supprimé!');
    }

    // 🔍 Filtrer les transfers entre deux dates
    public function filterByPeriod(Request $request)
    {
        $start_date = $request->query('start');
        $end_date = $request->query('end');

        $transfers = Transfers::whereBetween('dateTransfer', [$start_date, $end_date])->get();
        return view('transfers.index', compact('transfers'));
    }
}
