<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    protected $fillable = ['idJoueur', 'idEquipeDepart', 'idEquipeArrivee', 'montant', 'dateTransfert'];

    public function joueur()
    {
        return $this->belongsTo(Joueurs::class, 'idJoueur');
    }

    public function equipeDepart()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeDepart');
    }

    public function equipeArrivee()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeArrivee');
    }
}

