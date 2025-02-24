<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    protected $fillable = ['idCompetition', 'idEquipeDomicile', 'idEquipeExterieur', 'dateMatch', 'scoreDomicile', 'scoreExterieur'];

    public function competition()
    {
        return $this->belongsTo(Competitions::class, 'idCompetition');
    }

    public function equipeDomicile()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeDomicile');
    }

    public function equipeExterieur()
    {
        return $this->belongsTo(Equipes::class, 'idEquipeExterieur');
    }
}

