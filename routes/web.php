<?php


use App\Http\Controllers\ControllerEquipes;
use App\Http\Controllers\ControllerJoueurs;
use App\Http\Controllers\ControllerCompetitions;
use App\Http\Controllers\ControllerMatchs;
use App\Http\Controllers\ControllerTransfers;
use Illuminate\Support\Facades\Route;

// 🏠 Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// 📌 CRUD Routes for Each Entity
Route::resource('equipes', ControllerEquipes::class);
Route::resource('joueurs', ControllerJoueurs::class);
Route::resource('competitions', ControllerCompetitions::class);
Route::resource('matchs', ControllerMatchs::class);
Route::resource('transferts', ControllerTransfers::class);

// 📌 Filtering Routes
Route::get('/joueurs/equipe/{idEquipe}', [ControllerJoueurs::class, 'filterByTeam'])->name('joueurs.byTeam');
Route::get('/matchs/competition/{idCompetition}', [ControllerMatchs::class, 'filterByCompetition'])->name('matchs.byCompetition');
Route::get('/matchs/date/{date}', [ControllerMatchs::class, 'filterByDate'])->name('matchs.byDate');
Route::get('/transferts/periode', [ControllerTransfers::class, 'filterByPeriod'])->name('transferts.byPeriod');

