<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joueurs extends Model
{
    protected $fillable = ['nom', 'prenom', 'poste', 'nationalite', 'idEquipe'];

    public function equipe()
    {
        return $this->belongsTo(Equipes::class, 'idEquipe');

    }

    public function transfers()
    {
        return $this->hasMany(Transfers::class, 'idJoueur');
    }
}
