<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use Illuminate\Http\Request;

class ControllerCompetitions extends Controller
{
    public function index(){
        $competition = Competitions::all();
        return view('Competitions.index', compact('competition'));
    }

    public function create(){
        return view('Competitions.create');
    }

    public function store(Request $request, Competitions $competition){
        $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'année' => 'required|Integer'
        ]);

        $competition->update($request->all());
        return redirect()->route('Competitions.index')->with('succes', 'Competition mise à jour!');
    }

    public function destroy(Competitions $competition){
        $competition->delete();
        return redirect()->route('Competitions.index')->with('success , competition  suprimée');
    }


}
