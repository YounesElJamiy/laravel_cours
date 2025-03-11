<?php


use App\Http\Controllers\ControllerEquipes;
use App\Http\Controllers\ControllerJoueurs;
use App\Http\Controllers\ControllerCompetitions;
use App\Http\Controllers\ControllerMatchs;
use App\Http\Controllers\ControllerTransfers;
use Illuminate\Support\Facades\Route;

// 🏠 Home Page
Route::get('/home', function () {
    return view('home');
})->name('home');

// 📌 CRUD Routes for Each Entity
Route::resource('equipes', ControllerEquipes::class);
Route::resource('joueurs', ControllerJoueurs::class);
Route::resource('competitions', ControllerCompetitions::class);
Route::resource('matchs', ControllerMatchs::class);
Route::resource('transfers', ControllerTransfers::class);

// 📌 Filtering Routes
Route::get('/joueurs/equipes/{idEquipe}', [ControllerJoueurs::class, 'filterByTeam'])->name('joueurs.byTeam');
Route::get('/matchs/competitions/{idCompetition}', [ControllerMatchs::class, 'filterByCompetition'])->name('matchs.byCompetition');
Route::get('/matchs/date/{date}', [ControllerMatchs::class, 'filterByDate'])->name('matchs.byDate');
Route::get('/transfers/periode', [ControllerTransfers::class, 'filterByPeriod'])->name('transferts.byPeriod');

