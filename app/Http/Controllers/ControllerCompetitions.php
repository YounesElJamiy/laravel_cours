<?php

namespace App\Http\Controllers;

use App\Models\Competitions;
use Illuminate\Http\Request;

class ControllerCompetitions extends Controller
{
    public function index(){
        $competitions = Competitions::all();
        return view('Competitions.index', compact('competitions'));
    }

    public function create(){
        return view('Competitions.create');
    }

    public function store(Request $request, Competitions $competitions){
        $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'année' => 'required|Integer'
        ]);

        $competitions->update($request->all());
        return redirect()->route('Competitions.index')->with('succes', 'Competition mise à jour!');
    }

    public function destroy(Competitions $competitions){
        $competitions->delete();
        return redirect()->route('Competitions.index')->with('success , competition  suprimée');
    }


}
