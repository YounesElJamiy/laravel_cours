<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipes extends Model
{
    protected $fillable = ['nom', 'pays', 'entraineur'];

    public function joueurs()
    {
        return $this->hasMany(Joueurs::class, 'idEquipe');
    }

    public function matchsDomicile()
    {
        return $this->hasMany(Matchs::class, 'idEquipeDomicile');
    }

    public function matchsExterieur()
    {
        return $this->hasMany(Matchs::class, 'idEquipeExteriuer');
    }
}
